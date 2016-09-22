'use strict'

export function config(name, value) {
    store.dispatch({ type: 'config', name, value });
}

export function comment(comment) {
    comment.type = 'comment'
    store.dispatch(comment);
}

export function comments(comments) {
    store.dispatch({ type: 'comments', comments });
}