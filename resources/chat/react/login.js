'use strict'
const ajaxUpload = require('../utils/AjaxUpload')
class Login extends React.Component {
    constructor() {
        super();
        this.state = {
            username: '',
            password: '',
            file: '../images/1.jpg'
        }
    } 
    _onChangeUsername(e) {
        this.setState({
            'username': e.target.value
        })
    }
    _onChangePassword(e) {
        this.setState({
            'password': e.target.value
        })
    }
    _upload(e) {
        console.log(e);
        e.preventDefault()
        let files = e.target.files
            // 文件过滤
            // 只允许上传图片
        files = Array.prototype.slice.call(files, 0)
        files = files.filter(function(file) {
            return /image/i.test(file.type)
        })
        let file = files[0]
        file.thumb = URL.createObjectURL(files[0])
        file.state = 0
        this.setState({
            file: file.thumb
        })
        return ajaxUpload({
            url: 'uploads',
            name: 'file',
            key: file.name,
            file: files[0],
            onProgress: (e) => {
                console.log((e.loaded / e.total) * 100 + '%')
            },
            onLoad: (e) => {
                let res = JSON.parse(e.currentTarget.responseText)
                file.state = 1
                this.setState({
                    file: file
                })
            },
            onError: () => {
                file.state = 2
                this.setState({
                    file: file
                })
            }
        })
    }
    _login(e) {
        console.log(this.state);
        let url = this.props.title == '登陆' ? 'chat/login' : 'chat/register'
        request
            .post(url)
            .send(this.state)
            .set('Accept', 'application/json')
            .end(function(err, res) {
                if (res.ok) {
                    let data = JSON.parse(res.text)
                    let user = data.data
                    localStorage.username = user.user_name
                    localStorage.head_img = user.head_img ? user.head_img : './images/avatar/' + Math.floor(Math.random() * 6) + '.jpg'
                    config('login', false)
                    config('islogin', true)
                } else {
                    alert(res.text)
                }
            }.bind(this))
    }
    _onBack() {
        config('login', false)
    }
    _toggle() {
        console.log(this.props.title);
        let title = '登陆'
        if (this.props.title == '登陆') {
            title = '注册'
        }
        config('login_title', title)
    }
    render() {
        let title = this.props.title
        return (
            React.createElement('div', {
                    id: 'login'
                },
                React.createElement('div', {
                        className: 'header'
                    },
                    React.createElement('a', {
                        className: 'icon icon-left',
                        onClick: this._onBack.bind(this)
                    }),
                    React.createElement('h1', {}, title)
                ),
                React.createElement('div', {
                        className: 'content'
                    },
                    React.createElement('div', {
                            className: 'form'
                        },
                        React.createElement('input', {
                            type: 'text',
                            className: 'input',
                            placeholder: '请输入用户名',
                            onChange: this._onChangeUsername.bind(this)
                        }),
                        React.createElement('input', {
                            type: 'password',
                            className: 'input',
                            placeholder: '请输入密码',
                            onChange: this._onChangePassword.bind(this)
                        }),
                        title == '注册' ? React.createElement('div', {
                                className: 'uploader_div',
                                style: {
                                    backgroundImage: 'url(' + this.state.file + ')',
                                }
                            },
                            React.createElement('input', {
                                className: 'uploader_input',
                                type: 'file',
                                accept: 'image/*',
                                multiple: false,
                                onChange: this._upload.bind(this)
                            })
                        ) : null,
                        React.createElement('input', {
                            type: 'button',
                            className: 'submit',
                            value: title,
                            onClick: this._login.bind(this)
                        }),
                        React.createElement('input', {
                            type: 'button',
                            className: 'submit submit2',
                            value: title == '登陆' ? '我要注册' : '返回登陆',
                            onClick: this._toggle.bind(this)
                        })
                    )
                )
            )
        )
    }
}

export default Login;