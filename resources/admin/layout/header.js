'use strict'
const {
    Link
} = ReactRouter;

const Apicloud = require('../components/utils/Apicloud')
class A extends React.Component {
    render() {
        return (
            React.createElement('li', {
                className: 'pure-menu-item'
            },
                React.createElement(Link, {
                    className: 'pure-menu-link',
                    to: '/' + this.props.to,
                    activeClassName: 'active'
                },
                    this.props.title
                )
            )
        )
    }
}
class Header extends React.Component {
    constructor() {
        super()
        this.state = {
            menu: null
        }
    }
    render() {
        let msg = ConfigStore.get('msg')
        return (
            React.createElement('header', {
                id: 'header',
                className: 'pure-u-1 pure-menu pure-menu-horizontal pure-menu-fixed'
            },
                React.createElement(Link, {
                    className: 'pure-menu-heading pure-menu-link left',
                    to: '/'
                }, '我的理想乡'),
                React.createElement('ul', {
                    className: 'pure-menu-list right'
                },
                    React.createElement(A, {
                        to: 'login',
                        title: '登陆'
                    }),
                    React.createElement(A, {
                        to: 'logout',
                        title: '登出'
                    })
                )
            )
        )
    }
}
module.exports = Header
