'use strict';

class Logout extends React.Component {
    constructor() {
        super()
    }
    componentDidMount() {
        request
            .get('admin/logout')
            .end(function (err, res) {
                if (err) {
                    reject('error');
                } else {
                    storedb('user').remove()
                    this.props.history.pushState(null, 'login')
                }
            }.bind(this))
    }
    render() {
        return (
            null
        )
    }
}

module.exports = Logout
