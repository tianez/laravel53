/**
 * param 将要转为URL参数字符串的对象
 * key URL参数字符串的前缀
 * encode true/false 是否进行URL编码,默认为true
 * 
 * return URL参数字符串
 */
var urlEncode = function (param, key, encode) {
    if (param == null) return '';
    var paramStr = '';
    var t = typeof (param);
    if (t == 'string' || t == 'number' || t == 'boolean') {
        paramStr += '&' + key + '=' + ((encode == null || encode) ? encodeURIComponent(param) : param);
    } else {
        for (var i in param) {
            console.log(i);

            var k = key == null ? i : key + (param instanceof Array ? '[' + i + ']' : '.' + i);
            paramStr += urlEncode(param[i], k, encode);
        }
    }
    return paramStr;
};


function status(response) {
    if (response.status == 200) {
        return Promise.resolve(response);
    } else {
        return Promise.reject(new Error(response));
    }
}

function json(response) {
    return response.json();
}

function getfetch(url, param) {
    let params = urlEncode(param)
    return fetch(url + '?' + params, {
            credentials: "include"
        })
        .then(status)
        .then(json)
        .catch(function (err) {
            console.log("Fetch错误:" + err);
        });
}

var Upload = React.createClass({
    getInitialState: function () {
        return {
            file: './images/avatar/4.jpg',
            res: 'oooooo'
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
        var param = {
            'file': files[0],
            'dir': 'hsdsds'
        }
        this.uploadFile(files[0])
    },
    uploadFile: function (param) {
        var data = new FormData();
        // for (var i in param) {
        //     data.append(i, param[i])
        // }
        data.append('file', param)
        fetch('chat/avatar', {
                method: 'post',
                body: data
            })
            .then(function (response) {
                return response.json()
            })
            .then(function (res) {
                this.setState({
                    res: JSON.stringify(res)
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