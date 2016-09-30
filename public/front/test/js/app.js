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

	var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol ? "symbol" : typeof obj; };

	/**
	 * param 将要转为URL参数字符串的对象
	 * key URL参数字符串的前缀
	 * encode true/false 是否进行URL编码,默认为true
	 * 
	 * return URL参数字符串
	 */
	var urlEncode = function urlEncode(param, key, encode) {
	    if (param == null) return '';
	    var paramStr = '';
	    var t = typeof param === 'undefined' ? 'undefined' : _typeof(param);
	    if (t == 'string' || t == 'number' || t == 'boolean') {
	        paramStr += '&' + key + '=' + (encode == null || encode ? encodeURIComponent(param) : param);
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
	    var params = urlEncode(param);
	    return fetch(url + '?' + params, {
	        credentials: "include"
	    }).then(status).then(json).catch(function (err) {
	        console.log("Fetch错误:" + err);
	    });
	}

	var Upload = React.createClass({
	    displayName: 'Upload',

	    getInitialState: function getInitialState() {
	        return {
	            file: './images/avatar/4.jpg',
	            res: 'oooooo'
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
	        var thumb = URL.createObjectURL(files[0]);
	        this.setState({
	            file: thumb
	        });
	        var param = {
	            'file': files[0],
	            'dir': 'hsdsds'
	        };
	        this.uploadFile(files[0]);
	    },
	    uploadFile: function uploadFile(param) {
	        var data = new FormData();
	        // for (var i in param) {
	        //     data.append(i, param[i])
	        // }
	        data.append('file', param);
	        fetch('chat/avatar', {
	            method: 'post',
	            body: data
	        }).then(function (response) {
	            return response.json();
	        }).then(function (res) {
	            this.setState({
	                res: JSON.stringify(res)
	            });
	        }.bind(this));
	    },
	    render: function render() {
	        return React.createElement('div', {}, React.createElement('input', {
	            id: 'file',
	            type: 'file',
	            multiple: 'multiple',
	            accept: 'image/*',
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