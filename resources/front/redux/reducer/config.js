'use strict'

let init = {
    show: 0,
    login: false,
    islogin: false,
    login_title: '登陆',
    title: 'My React'
}

export function config(state = init, action) {
    switch (action.type) {
        case 'config':
            let config = clone(state)
            config[action.name] = action.value
            return config
        default:
            return state;
    }
}