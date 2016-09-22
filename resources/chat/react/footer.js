'use strict'

class Footer extends React.Component {
    constructor() {
        super();
    }
    _onClick(e) {
        e.preventDefault()
        if (localStorage.username) {
            this.refs.input.focus()
            config('islogin', true)
            return
        } 
        config('login', true)
    }
    _onSubmit() {
        if(this.refs.input.value.trim()==''){
            alert('请输入内容')
            return
        }
        config('show', 1)
        request
            .post('chat')
            .send({
                content: this.refs.input.value,
                username: localStorage.username,
                user_id: localStorage.userid,
                head_img: localStorage.head_img
            })
            .set('Accept', 'application/json')
            .end(function(err, res) {
                if (res.ok) {
                    this.refs.input.value = ''
                    this.props.scrollTop()
                } else {
                    alert(res.text)
                }
            }.bind(this))
    }
    render() {
        return (
            React.createElement('div', {
                    id: 'footer'
                },
                React.createElement('div', {
                    id: 'formd',
                    style: {
                        display: this.props.islogin ? 'none' : 'block'
                    },
                    onClick: this._onClick.bind(this)
                }),
                React.createElement('div', {
                        id: 'form'
                    },
                    React.createElement('div', {
                            className: 'f1'
                        },
                        React.createElement('input', {
                            ref: 'input',
                            type: 'text',
                            className: 'input',
                            placeholder: '我要发言',
                        })
                    ),
                    React.createElement('div', {
                            className: 'f2'
                        },
                        React.createElement('input', {
                            type: 'button',
                            className: 'submit',
                            value: '发送',
                            onClick: this._onSubmit.bind(this)
                        })
                    )
                )
            )
        )
    }
}

export default Footer;