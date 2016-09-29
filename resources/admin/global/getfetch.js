'use strict'

function catchs(err) {
    console.log(err);
    window.history.back()
    Rd.message(err.status + '错误！' + err.text)
} 

export function getfetch2(url, query = {}) {
    return new Promise(function (resolve, reject) {
        request
            .get(url)
            .query(query)
            .end(function (err, res) {
                if (res.status == 200) {
                    resolve(JSON.parse(res.text))
                } else {
                    reject(err.response);
                }
            })
    }).catch(catchs);
}

export function postfetch(url, query = {}, data = {}) {
    return new Promise(function (resolve, reject) {
        request
            .post(url)
            .query(query)
            .send(data)
            .end(function (err, res) {
                if (res.status == 200) {
                    resolve(JSON.parse(res.text))
                } else {
                    reject(err.response);
                }
            })
    }).catch(catchs);
}


function status(response) {
    if (response.status == 200) {
        return Promise.resolve(response);
    } else {
        return Promise.reject(new Error(response));
    }
}

function json(response) {
    return response.json();
}

export function getfetch(url, cb) {
    fetch(url, {
            credentials: "include"
        })
        .then(status)
        .then(json)
        .then(cb)
        .catch(function (err) {
            console.log("Fetch错误:" + err);
        });
}