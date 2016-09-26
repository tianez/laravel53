'use strict'


//获取当前用户信息
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

function getfetch2(url) {
    return new Promise(function (resolve, reject) {
        request
            .get(url)
            // .query({
            //     filter: JSON.stringify(filter)
            // })
            .end(function (err, res) {
                if (res.status == 200) {
                    resolve(JSON.parse(res.text))
                } else {
                    reject(new Error(res.text));
                }
            })
    }).catch(function (err) {
        console.log("Fetch错误:" + err);
    });
}

function getfetch(url, cb) {
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

module.exports = getfetch2