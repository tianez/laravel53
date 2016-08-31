'use strict'

const classNames = require('classNames')
const FormGroup = require('./FormGroup')

var Radio = React.createClass({
    getDefaultProps: function () {
        return {
            title: '单选框',
            type: 'radio',
            value: 2,
            f_default:'sdsds',
            f_options: [{
                title: '选项1',
                value: 1
            }, {
                    title: '选项2',
                    value: 2
                }],
            name: 'state',
            placeholder: '',
            help: '',
            disabled: '',
            required: 'required'
        }
    },
    getInitialState: function () {
        let options = this.props.f_options
        if (typeof options == "string") {
            options = JSON.parse(options)
        } 
        return {
            files: this.props.files,
            value: this.props.value,
            help: this.props.help,
            option: options
        }
    },
    _onChange: function (e) {
        let value = e.target.value
        this.setState({
            value: value
        })
        console.log(value);
        if (this.props.onChange) {
            this.props.onChange(this.props.name, value)
        }
    },
    render: function () {
        let value = this.state.value
        let name = this.props.name
        let options = this.state.option.map(function (d, index) {
            let checked = ''
            if (value == d.value) {
                checked = ' checked'
            }
            let typeClass = 'radio'
            return (
                React.createElement('label', {
                    key: index,
                    className: 'form-radio',
                    title: this.props.title,
                    help: this.state.help
                },
                    React.createElement('div', {
                        className: typeClass + checked
                    },
                        React.createElement('input', {
                            type: 'radio',
                            name: name,
                            value: d.value,
                            checked: checked,
                            onChange: this._onChange
                        })
                    ),
                    React.createElement('span', null, d.title)
                )
            )
        }.bind(this))
        return (
            React.createElement(FormGroup, {
                title: this.props.title,
                help: this.state.help
            },
                options
            )
        )
    }
})

module.exports = Radio
