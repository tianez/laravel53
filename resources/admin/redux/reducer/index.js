'use strict'
import { combineReducers } from 'redux';
import { routerReducer } from 'react-router-redux'

import { config } from './config'
import { comments } from './comments'
import { pagedata } from './pagedata'

const reducer = combineReducers({
    config,
    comments,
    pagedata,
    routing: routerReducer
})

export default reducer;