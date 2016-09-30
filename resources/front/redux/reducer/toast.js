'use strict'

export function toast(state = '', action) {
    switch (action.type) {
        case 'toast':
            return {
                message: action.message,
                time: new Date()
            }
        default:
            return state;
    }
}