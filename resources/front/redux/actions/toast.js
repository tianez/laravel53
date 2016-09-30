'use strict'

export function toast(message, time) {
    store.dispatch({
        type: 'toast',
        message
    });
}