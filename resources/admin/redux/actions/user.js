'use strict'
//获取当前用户信息
export function user() {
    return store.dispatch(function () {
        fetch("admin/user", {
            credentials: "include"
        }).then(
            function (response) {
                if (response.status !== 200) {
                    console.log("存在一个问题，状态码为：" + response.status);
                    return;
                }
                //检查响应文本
                response.json().then(function (data) {
                    console.log(data);
                    config('user', data);
                    comment(data)
                });
            })
            .catch(function (err) {
                console.log("Fetch错误:" + err);
            });
    });
}