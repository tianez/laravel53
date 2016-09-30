'use strict'
import './less/style.less'
require('./global')
    /**
     * 路由
     */

//应用中间件
import {
    createStore,
    applyMiddleware
} from 'redux'
import reducer from './redux/reducer';
import thunk from 'redux-thunk'
import log from './redux/middleware';
let createStoreWithLog = applyMiddleware(thunk)(createStore);
window.store = createStoreWithLog(reducer)
store.subscribe(() => {
    let state = store.getState()
    console.log(state);
    window.document.title = state.config.title
})

import {
    Provider,
    connect
} from 'react-redux'

window.connect = connect
window.Rd = require('./redux/actions')

const routers = require('./router')

ReactDOM.render(
    React.createElement(Provider, {
            store: store
        },
        routers),
    document.getElementById('app')
)