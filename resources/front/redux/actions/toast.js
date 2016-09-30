'use strict'

export function toast(message, time) {
    time = time ? time : 3000
    store.dispatch({
        type: 'toast',
        message
    })
    setTimeout(() => {
        store.dispatch({
            type: 'toast',
            message: ''
        })
    }, time)
}