'use strict'

function clone(myObj) {
    if (typeof (myObj) != 'object') return myObj;
    if (myObj == null) return myObj;
    var myNewObj = new Object();
    for (var i in myObj)
        myNewObj[i] = clone(myObj[i]);
    return myNewObj;
}
 
export function config(state = {}, action) {
    switch (action.type) {
        case 'config':
            let config = clone(state)
            config[action.name] = action.value
            return config
            // return Object.assign({}, state, {
            //     visibilityFilter: action.filter
            // })
        default:
            return state;
    }
}