 var Upload = React.createClass({
     getInitialState: function() {
         return {
             file: './images/4.jpg',

         }
     },
     _onChange: function(e) {
         e.preventDefault()
         let files = e.target.files
             // 文件过滤
             // 只允许上传图片
         files = Array.prototype.slice.call(files, 0)
         files = files.filter(function(file) {
             return /image/i.test(file.type)
         })
         let value
         let thumb = URL.createObjectURL(files[0])
         this.setState({
             file: thumb
         })
         this.uploadFile(files[0])
     },
     uploadFile: function(file) {
         return ajaxUpload({
             url: 'uploads',
             name: 'file',
             key: file.name,
             file: file,
             onProgress: (e) => {
                 console.log((e.loaded / e.total) * 100 + '%')
             },
             onLoad: (e) => {
                 let thumbs
                 let res = JSON.parse(e.currentTarget.responseText)
                 console.log(res);
             },
             onError: () => {
                 console.log('err');
             }
         })
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
                 React.createElement('div', {
                     className: 'form-canvas'
                 }, this.state.file)
             )
         )
     }
 })

 ReactDOM.render(
     React.createElement(Upload),
     document.getElementById('app')
 )