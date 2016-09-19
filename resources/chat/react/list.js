'use strict'

class List extends React.Component {
    constructor(props) {
        super(props);
    }
    render() {
        let ul = this.props.data.map(function (d, index) {
            return React.createElement('div', {
                className: 'li',
                key: index
            },
                React.createElement('div', {
                    className: 'thumb'
                },
                    React.createElement('img', {
                        src: d.head_img
                    })
                ),
                React.createElement('div', {
                    className: 'c'
                },
                    React.createElement('div', {
                        className: 'c1'
                    }, d.name),
                    React.createElement('div', {
                        className: 'c2'
                    }, '33分钟前'),
                    React.createElement('div', {
                        className: 'c3'
                    }, d.content)
                )
            )
        })
        return (
            React.createElement('div', {
                className: this.props.show == 1 ? 'content2 active' : 'content2'
            }, ul)
        );
    }
}

export default List;