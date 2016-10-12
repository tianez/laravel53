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

export function today(comment) {
    comment.type = 'today'
    store.dispatch(comment);
}

export function todays(comments) {
    store.dispatch({ type: 'todays', comments });
}

export function yesterday(comments) {
    store.dispatch({ type: 'yesterday', comments });
}