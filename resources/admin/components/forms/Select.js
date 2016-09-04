'use strict'

const classNames = require('classNames')
const FormGroup = require('./FormGroup')

class Select extends React.Component {
    constructor(props) {
        super(props)
        let options = []
        if (!this.props.f_ext) {
            options = this.props.f_options
            if (typeof options == "string") {
                options = JSON.parse(options)
            }
        }
        let title
        options.forEach(function (element) {
            if (props.value == element.value) {
                title = element.title
            }
        }, this);
        this.state = {
            files: props.files,
            value: props.value,
            name: title || props.name,
            help: props.help,
            options: options,
            show: false,
            search: '',
        }
    }
    componentDidMount() {
        if (this.props.f_ext) {
            request.get('admin/' + this.props.f_ext)
                .end(function (err, res) {
                    let data = JSON.parse(res.text)
                    let title
                    data.forEach(function (element) {
                        if (this.props.value == element.value) {
                            title = element.title
                        }
                    }, this);
                    this.setState({
                        options: data,
                        name: title
                    })
                }.bind(this))
        }
    }
    _toggleShow(e) {
        this.setState({
            show: !this.state.show
        })
    }
    _changeChoose(value, titie) {
        this.setState({
            value: value,
            name: titie,
            show: false,
            search: '',
        })
        if (this.props.onChange) {
            this.props.onChange(this.props.name, value)
        }
    }
    _onSearch(e) {
        e.preventDefault()
        let value = e.target.value
        this.setState({
            search: value
        })
    }
    render() {
        let value = this.state.value
        let name = this.props.name
        let search = this.state.search
        let options = this.state.options.map(function (d, index) {
            let isActive = value == d.value ? ' active' : ''
            let style = 'block'
            if (d.title.indexOf(search) == -1) {
                style = 'none'
            }
            return (
                React.createElement('div', {
                    key: index,
                    className: 'form-option' + isActive,
                    style: {
                        display: style
                    },
                    onClick: this._changeChoose.bind(this, d.value, d.title)
                },
                    d.title
                )
            )
        }.bind(this))
        return (
            React.createElement(FormGroup, {
                title: this.props.title,
                help: this.state.help,
                className: 'form-select'
            },
                React.createElement('div', {
                    className: 'form-input',
                    onClick: this._toggleShow.bind(this)
                }, this.state.name), 
                React.createElement('div', {
                    className: 'form-choose',
                    style: {
                        display: this.state.show ? 'block' : 'none'
                    }
                },
                    React.createElement('div', {
                        className: 'form-select-search'
                    },
                        React.createElement('input', {
                            className: 'form-input',
                            value: this.state.search,
                            placeholder: 'Search',
                            onChange: this._onSearch.bind(this)
                        })),
                    React.createElement('div', {
                        className: 'form-select-choose'
                    },
                        options
                    )
                )
            )
        )
    }
}
Select.defaultProps = {
    title: '单选框',
    type: 'radio',
    value: 2,
    f_options: [{
        title: '选项1',
        value: 1
    }, {
            title: '选项2',
            value: 2
        }, {
            title: '选项3',
            value: 3
        }, {
            title: '选项4',
            value: 4
        }],
    name: 'state',
    placeholder: '',
    help: '',
    disabled: '',
    required: 'required'
}
module.exports = Select
