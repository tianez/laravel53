'use strict'
import { combineReducers } from 'redux';
import { routerReducer } from 'react-router-redux'

import { config } from './config'
import { comments } from './comments'

const reducer = combineReducers({
    config,
    comments,
    routing: routerReducer
})

export default reducer;