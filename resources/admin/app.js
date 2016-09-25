'use strict'
// const React = require('react');
// const ReactDOM = require('react-dom');
// const ReactRouter = require('react-router');
// import './less/style.less' //webpack编译时导入
  
import { createStore, applyMiddleware } from 'redux'
import { Provider, connect } from 'react-redux'
import { syncHistoryWithStore, routerReducer } from 'react-router-redux'
import reducer from './redux/reducer';
import { config, comment, comments, user, pagedata} from './redux/actions'

window.connect = connect

window.config = config
window.comment = comment
window.comments = comments
window.user = user
window.pagedata = pagedata

let initialState = {
    config: {
        show: 0,
        login: false,
        islogin: false,
        login_title: '登陆',
        title: 'My React'
    }
}

//应用中间件
import log from './redux/middleware';
import thunk from 'redux-thunk'
let createStoreWithLog = applyMiddleware(thunk)(createStore);
window.store = createStoreWithLog(reducer, initialState)
const { Router, Route, IndexRoute, IndexRedirect, Redirect, hashHistory, browserHistory } = ReactRouter
const history = syncHistoryWithStore(hashHistory, store)

store.subscribe(() => {
    let state = store.getState()
    console.log(state);
    window.document.title = state.config.title
})

const Layout = require('./layout/layout')
const { Nomatch, Home, Drag, ApiCloudsIndex, ApiClouds, ApiCloud, Pages, Page, Login, Logout, Import } = require('./pages')

require('./global')

function onEnter(nextState, replace) {
    let pathname = nextState.location.pathname
    let state = store.getState()    
    let user = state.config.user.user_name
    console.log('当前用户:' + user);
    if (!user && pathname !== 'login' && pathname !== '/login') {
        ConfigActions.update('msg', '你还没有登录，请先登录！')
        replace({
            pathname: '/login' 
        })
    } else if (user && (pathname == 'login' || pathname == '/login')) {
        replace({
            pathname: '/'
        })
    }
}

const routers = (
    React.createElement(Router, { history: history },
        React.createElement(Route, { path: "/", component: Layout, onEnter: onEnter},
            React.createElement(IndexRedirect, { to: 'index' }),
            // React.createElement(IndexRoute, {
            //     component: Home,
            //     onEnter: onEnter
            // }),
            React.createElement(Route, { path: "index", component: Home }),
            React.createElement(Route, { path: "import", component: Import}),
            React.createElement(Route, { path: "drag", component: Drag }),
            React.createElement(Route, { path: "apicloud" },
                React.createElement(IndexRoute, { component: ApiCloudsIndex }),
                React.createElement(Route, { path: ":clouds" },
                    React.createElement(IndexRoute, { component: ApiClouds }),
                    React.createElement(Route, { path: ":articleId", component: ApiCloud })
                )
            ),
            React.createElement(Route, { path: "api", },
                React.createElement(IndexRoute, { component: ApiCloudsIndex }),
                React.createElement(Redirect, { from: ':pages', to: ':pages/index' }),
                React.createElement(Route, { path: ":pages" },
                    React.createElement(Route, { path: "index", component: Pages }),
                    React.createElement(Route, { path: ":page", component: Page })
                )
            )
        ),
        React.createElement(Route, { path: "login", component: Login }),
        React.createElement(Route, { path: "logout", component: Logout }),
        React.createElement(Route, { path: "*", component: Nomatch })
    )
)

function status(response) {
    if (response.status == 200) {
        return Promise.resolve(response);
    }
    else {
        return Promise.reject(new Error(response));
    }
}

function json(response) {
    return response.json();
}

function Init() {
    fetch("admin/user", { credentials: "include" })
            .then(status)
            .then(json)
            .then(function (data) {
                console.log(data);
                config('user', data);
                ReactDOM.render(
    React.createElement(Provider, { store: store },
        routers),
    document.getElementById('app')
)
            })
            .catch(function (err) {
                console.log("Fetch错误:" + err);
            });
}

Init()

