'use strict'
/**
 * 路由
 */
import { syncHistoryWithStore } from 'react-router-redux'
const { Router, Route, IndexRoute, IndexRedirect, Redirect, hashHistory, browserHistory } = ReactRouter
const history = syncHistoryWithStore(hashHistory, store)

const {
    Layout,
    Nomatch,
    Home,
    Post,
    Post2,
    Weui
} = require('./pages')

const routers = (
    React.createElement(Router, { history: history },
        React.createElement(Route, { path: "/", component: Layout },
            React.createElement(IndexRoute, { component: Home }),
            React.createElement(Route, { path: "post", component: Post }),
            React.createElement(Route, { path: "post2", component: Post2 }),
            React.createElement(Route, { path: "weui", component: Weui }),
            React.createElement(Route, { path: "*", component: Nomatch })
        )
    )
)

module.exports = routers