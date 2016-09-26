function runAsync(data) {
    var p = new Promise(function (resolve, reject) {
        setTimeout(function () {
            console.log(data);
            resolve(data);
        }, 2000);
    });
    return p;
}

function runAsync2(data) {
    var p2 = new Promise(function (resolve, reject) {
        setTimeout(function () {
            console.log(data);
            resolve(data);
        }, 3000);
    });
    return p2;
}


runAsync('hao de asds').then(function (data) {
    return runAsync('haodemasds')

}).then(function (data) {
    // return runAsync('haodemasds22222222')
    return Promise.all([runAsync('1'),runAsync2('2'),runAsync('3')]);
}).then(function (data) {
    // return Promise.resolve('wanchegnwanchegnwanchegn');
    return runAsync('wanchegnwanchegnwanchegn')
}).then(function (data) {
    console.log(data);
    console.log('wanchegn');
}).catch(function (err) {
    console.log("Fetch错误:" + err);
})