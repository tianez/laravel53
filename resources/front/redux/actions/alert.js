'use strict'

export function alert(message, time) {
    store.dispatch({
        type: 'alert',
        message
    });
}