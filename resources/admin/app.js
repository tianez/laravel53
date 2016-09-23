'use strict'
// const React = require('react');
// const ReactDOM = require('react-dom');
// const ReactRouter = require('react-router');
// import './less/style.less' //webpack编译时导入

import { createStore } from 'redux'
import { Provider } from 'react-redux'
import { syncHistoryWithStore, routerReducer } from 'react-router-redux'
import reducer from './redux/reducer';
import { config, comment, comments } from './redux/actions'

window.config = config
window.comment = comment
window.comments = comments

let initialState = {
    config: {
        show: 0,
        login: false,
        islogin: false,
        login_title: '登陆'
    }
}

window.store = createStore(reducer, initialState);
const { Router, Route, IndexRoute, IndexRedirect, Redirect, hashHistory, browserHistory } = ReactRouter
const history = syncHistoryWithStore(hashHistory, store)

store.subscribe(() =>
    console.log(store.getState())
);

const Layout = require('./layout/layout')
const { Nomatch, Home, Drag, ApiCloudsIndex, ApiClouds, ApiCloud, Pages, Page, Login, Logout, Import } = require('./pages')

require('./global')

// function onEnter(nextState, replace) {
//     let pathname = nextState.location.pathname
//     let user = storedb('user').find() ? true : false
//     console.log('当前用户:' + storedb('user').find());
//     if (!user && pathname !== 'login' && pathname !== '/login') {
//         ConfigActions.update('msg', '你还没有登录，请先登录！')
//         replace({
//             pathname: '/login'
//         })
//     } else if (user && (pathname == 'login' || pathname == '/login')) {
//         replace({
//             pathname: '/'
//         })
//     }
// }

const routers = (
    React.createElement(Router, { history: history },
        React.createElement(Route, { path: "/", component: Layout },
            React.createElement(IndexRedirect, { to: 'index' }),
            // React.createElement(IndexRoute, {
            //     component: Home,
            //     onEnter: onEnter
            // }),
            React.createElement(Route, { path: "index", component: Home }),
            React.createElement(Route, { path: "import", component: Import }),
            React.createElement(Route, { path: "drag", component: Drag }),
            React.createElement(Route, { path: "apicloud" },
                React.createElement(IndexRoute, {
                    component: ApiCloudsIndex,
                    // onEnter: onEnter
                }),
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

ReactDOM.render(
    React.createElement(Provider, {
        store: store
    }, routers),
    document.getElementById('app')
)