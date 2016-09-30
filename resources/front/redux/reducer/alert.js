'use strict'

export function alert(state = '', action) {
    switch (action.type) {
        case 'alert':
            return {
                message: action.message,
                time: new Date()
            }
        default:
            return state;
    }
}