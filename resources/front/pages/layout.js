'use strict'
const {
    Link
} = ReactRouter

const {
    Header,
    Content,
    Footer,
    Reload
} = require('../components/Layout')

const {
    Alert,
    Toast
} = require('../components/Weui')
class Layout extends React.Component {
    constructor() {
        super()
    }
    render() {
        return (
            React.createElement('div', {
                id: 'warper',
            },
                React.createElement(Header),
                this.props.children,
                React.createElement(Footer),
                React.createElement(Alert, { g: true }),
                React.createElement(Toast)
            )
        )
    }
}
module.exports = Layout