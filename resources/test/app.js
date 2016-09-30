var Upload = React.createClass({
    getInitialState: function () {
        return {
            file: './images/avatar/4.jpg',
            res: ''
        }
    },
    _onChange: function (e) {
        e.preventDefault()
        var files = e.target.files
            // 文件过滤
            // 只允许上传图片
        files = Array.prototype.slice.call(files, 0)
        files = files.filter(function (file) {
            return /image/i.test(file.type)
        })
        var thumb = URL.createObjectURL(files[0])
        this.setState({
            file: thumb
        })
        this.uploadFile(files[0])
    },
    uploadFile: function (file) {
        var data = new FormData();
        data.append('file', file)
        data.append('dir', 'avatar')
        fetch('chat/avatar', {
                method: 'post',
                body: data
            })
            .then(function (response) {
                return response.json()
            })
            .then(function (res) {
                console.log(res);
                this.setState({
                    res: res.filepath
                })
            }.bind(this))
    },
    render: function () {
        return (
            React.createElement('div', {},
                React.createElement('input', {
                    id: 'file',
                    type: 'file',
                    multiple: 'multiple',
                    accept: 'image/*',
                    onChange: this._onChange
                }),
                this.state.res,
                React.createElement('img', {
                    src: this.state.file,
                    style: {
                        maxWidth: '100%'
                    }
                })
            )
        )
    }
})

ReactDOM.render(
    React.createElement(Upload),
    document.getElementById('app')
)