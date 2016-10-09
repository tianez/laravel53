'use strict'

import {
    Iframe,
    Footer,
    Login,
    List
} from './index'
class Home extends React.Component {
    constructor() {
        super()
    }
    _onClick(i) {
        if (this.props.config.show !== i) {
            config('show', i)
        }
    }
    _onScroll(e) {
        console.log(e);
    }
    _scrollTop() {
        this.refs.content.scrollTop = 0
    }
    render() {
        let show = this.props.config.show
        return (
            React.createElement('div', {
                    id: 'bodyd',
                    className: this.props.config.login ? 'leftx' : ''
                },
                React.createElement(Iframe, {
                    login: this.props.config.login,
                    islogin: this.props.config.islogin
                }),
                React.createElement('div', {
                        id: 'main'
                    },
                    React.createElement('div', {
                            className: 'nav'
                        },
                        React.createElement('div', {
                            className: show == 0 ? 'nav1 active' : 'nav1',
                            onClick: this._onClick.bind(this, 0)
                        }, '今日话题'),
                        React.createElement('div', {
                            className: show == 1 ? 'nav1 active' : 'nav1',
                            onClick: this._onClick.bind(this, 1)
                        }, '评论' + this.props.config.number)
                    ),
                    React.createElement('div', {
                            id: 'content',
                            ref: 'content'
                        },
                        React.createElement('div', {
                                className: show == 0 ? 'content1 active' : 'content1',
                            },
                            ht
                        ),
                        React.createElement(List, {
                            show: show,
                            data: this.props.comment,
                        })
                    )
                ),
                React.createElement(Footer, {
                    islogin: this.props.config.islogin,
                    scrollTop: this._scrollTop.bind(this)
                }),
                React.createElement(Login, {
                    title: this.props.config.login_title
                })
            )
        )
    }
}

export default Home;