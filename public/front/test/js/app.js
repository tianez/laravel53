/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports) {

	'use strict';

	var Upload = React.createClass({
	    displayName: 'Upload',

	    getInitialState: function getInitialState() {
	        return {
	            file: './images/avatar/4.jpg',
	            res: 'sdsd'
	        };
	    },
	    _onChange: function _onChange(e) {
	        e.preventDefault();
	        var files = e.target.files;
	        // 文件过滤
	        // 只允许上传图片
	        files = Array.prototype.slice.call(files, 0);
	        files = files.filter(function (file) {
	            return (/image/i.test(file.type)
	            );
	        });
	        var value;
	        var thumb = URL.createObjectURL(files[0]);
	        this.setState({
	            file: thumb
	        });
	        this.uploadFile(files[0]);
	    },
	    uploadFile: function uploadFile(file) {
	        var data = new FormData();
	        data.append('file', file);
	        fetch('chat/avatar', {
	            method: 'post',
	            body: data
	        }).then(function (res) {
	            //  var res = JSON.parse(response)
	            console.log(res);
	            //  console.log(res);
	            this.setState({
	                res: res.status
	            });
	        }.bind(this));
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
	    render: function render() {
	        console.log(this.state);
	        return React.createElement('div', {}, React.createElement('input', {
	            id: 'file',
	            name: 'file',
	            className: 'ipt',
	            type: 'file',
	            multiple: 'multiple',
	            onChange: this._onChange
	        }), this.state.res, React.createElement('img', {
	            src: this.state.file,
	            style: {
	                maxWidth: '100%'
	            }
	        }));
	    }
	});

	ReactDOM.render(React.createElement(Upload), document.getElementById('app'));

/***/ }
/******/ ]);