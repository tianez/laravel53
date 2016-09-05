'use strict'
import {combineReducers  } from 'redux';

function counter(state = 0, action) {
    switch (action.type) {
        case 'INCREMENT':
            return state + action.index;
        case 'DECREMENT':
            return state - 1;
        default:
            return state;
    }
}

function config(state = [], action) {
    switch (action.type) {
        case 'user':
            return [
                ...state,
                {
                    text: action.text,
                    completed: false
                }
            ];
        default:
            return state;
    }
}
const reducer = combineReducers({
    // visibilityFilter,
    counter,
    config
})

export default reducer;