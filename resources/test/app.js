 var Upload = React.createClass({
     getInitialState: function() {
         return {
             file: './images/4.jpg',
             res: 'sdsd'
         }
     },
     _onChange: function(e) {
         e.preventDefault()
         var files = e.target.files
             // 文件过滤
             // 只允许上传图片
         files = Array.prototype.slice.call(files, 0)
         files = files.filter(function(file) {
             return /image/i.test(file.type)
         })
         var value
         var thumb = URL.createObjectURL(files[0])
         this.setState({
             file: thumb
         })
         this.uploadFile(files[0])
     },
     uploadFile: function(file) {
         var data = new FormData();
         data.append('file', file)
         fetch('./upload.php', {
                 method: 'post',
                 body: data
             }).then(function(res) {
                 //  var res = JSON.parse(response)
                 console.log(res);
                 //  console.log(res);
                 this.setState({
                     res: res.status
                 })
             }.bind(this))
             //  return ajaxUpload({
             //      url: 'uploads',
             //      name: 'file',
             //      key: file.name,
             //      file: file,
             //      onProgress: (e) => {
             //          console.log((e.loaded / e.total) * 100 + '%')
             //      },
             //      onLoad: (e) => {
             //          var thumbs
             //          var res = JSON.parse(e.currentTarget.responseText)
             //          console.log(res);
             //          this.setState({
             //              res: res
             //          })
             //      },
             //      onError: () => {
             //          console.log('err');
             //      }
             //  }.bind(this))
     },
     render: function() {
         console.log(this.state);
         return (
             React.createElement('div', {},
                 React.createElement('input', {
                     id: 'file',
                     name: 'file',
                     className: 'ipt',
                     type: 'file',
                     multiple: 'multiple',
                     onChange: this._onChange
                 }),
                 this.state.res,
                 React.createElement('img', {
                     src: this.state.file,
                     style: {
                         maxWidth:'100%'
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