'use strict'

export function addTodo(text) {
    return { type: 'user', text }
}

export function toggleTodo(index) {
    return { type: 'INCREMENT', index }
}