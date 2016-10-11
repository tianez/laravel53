'use strict'

import {
    createStore
} from 'redux';
import {
    Provider,
    connect
} from 'react-redux'
import reducer from './redux/reducer';
import {
    config,
    comment,
    comments,
    today,
    todays,
    yesterday
} from './redux/actions'

window.config = config
window.comment = comment
window.comments = comments
window.today = today
window.todays = todays
window.yesterday = yesterday
window.request = superagent

import Home from './react/home';

let initialState = {
    config: {
        show: 0,
        login: false,
        islogin: false,
        login_title: '登陆',
        number: 0
    }
}

window.store = createStore(reducer, initialState);
store.subscribe(() =>
    console.log(store.getState())
);

function mapStateToProps(state) {
    return state
}

const App = connect(mapStateToProps)(Home)

ReactDOM.render(
    React.createElement(Provider, {
            store: store
        },
        React.createElement(App)
    ),
    document.getElementById('app')
);