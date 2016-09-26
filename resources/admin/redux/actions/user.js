'use strict'

export function user(data) {
    store.dispatch({
        type: 'user',
        data
    });
}
//获取当前用户信息
function status(response) {
    if (response.status !== 200) {
        return Promise.resolve(response);
    } else {
        return Promise.reject(new Error(response));
    }
}

function json(response) {
    return response.json();
}

export function getuser() {
    fetch("admin/user", {
            credentials: "include"
        })
        .then(status)
        .then(json)
        .then(function (data) {
            console.log(data);
            user(data)
        })
        .catch(function (err) {
            console.log("Fetch错误:" + err);
        });
}