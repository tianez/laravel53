'use strict'
import { combineReducers } from 'redux';
import { routerReducer } from 'react-router-redux'

import { config } from './config'
import { user } from './user'
import { comments } from './comments'
import { pagedata } from './pagedata'
import { message } from './message'
import { alert } from './alert'

const reducer = combineReducers({
    config,
    user,
    comments,
    pagedata,
    message,
    alert,
    routing: routerReducer
})

export default reducer;