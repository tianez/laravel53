'use strict'

export function config(name, value) {
    store.dispatch({ type: 'config', name, value });
}

export function comment(comments) {
    comments.type = 'comment'
    store.dispatch(comments);
} 