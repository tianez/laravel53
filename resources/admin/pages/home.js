'use strict'

import { connect } from 'react-redux'

var Home = React.createClass({
    // propTypes: {
    //     counter: React.PropTypes.object
    // },
    getInitialState: function() {
        return {
            items: ['hello', 'world', 'click', 'me']
        };
    },
    componentDidMount: function() {
        ConfigActions.update('title', '首页')
        console.log('首页');
    },
    handleSelect: function(data) {
        console.log(data); // Momentjs object
        console.log(data.format('YYYY-MM-D HH d')); // Momentjs object
    },
    updateHtml: function(html) {
        this.setState({
            html: html
        })
    },
    click: function() {
        config('show', '1111')
        user()
    },
    render: function() {
        return (
            React.createElement('div', {
                    className: 'container pure-g'
                },
                React.createElement('div', {
                        className: 'pure-u-1',
                        onClick: this.click
                    }, '欢迎使用云上恩施cms 1.01版本！' + this.props.counter
                    // React.createElement('div', {
                    //     dangerouslySetInnerHTML: {
                    //         __html: this.state.html
                    //     }
                    // })
                )
            )
        )
    }
});

module.exports = connect(
    state => ({
        counter: state.config.show
    })
)(Home)