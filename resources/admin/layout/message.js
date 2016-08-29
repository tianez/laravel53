'use strict'

class Message extends React.Component {
    constructor() {
        super()

    }
    render() {
        let msg = ConfigStore.get('msg')
        return (
            msg?React.createElement('div', {
                id: 'message',
                className: 'message pure-u-1'
            }, msg):null
        )
    }
} 
module.exports = Message
