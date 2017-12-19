import React, { Component } from 'react';
import PropTypes from 'prop-types';
import isEmail from 'validator/lib/isEmail';
import isEmpty from 'validator/lib/isEmpty';

class Contact extends Component {
  static defaultProps = {
    contact: {},
    countries: [],
    errors: { contact: {} },
    texts: {},
    inline: false,
  };

  validate = (field, val = '') => {
    let valid = !isEmpty(val);
    if (field === 'email') valid = isEmail(val);
    const contact = { ...this.props.errors.contact, [field]: valid };
    return { ...this.props.errors, contact };
  };

  handleChange = (field, e) => {
    const val = e.currentTarget.value;
    const errors = this.validate(field, val);

    this.props.onChange({
      contact: { ...this.props.contact, [field]: val },
      errors,
    });
  };

  showErr = (field) => {
    const err = this.props.errors.contact[field] === false
      ? 'form-group__error'
      : 'hidden';

    return err;
  }

  inputErrStyle = (field) => {
    const err = this.props.errors.contact[field] === false ? 'form-group--error' : '';
    return err;
  }

  validateAll = () => {
    const { contact, texts } = this.props;
    const name = this.validate('name', contact.name);
    const email = this.validate('email', contact.email);
    const country = contact.country || texts.country;
    const countryValidation = this.validate('country', country);

    const errors = {
      ...this.props.errors,
      contact: {
        ...name.contact,
        ...email.contact,
        ...countryValidation.contact,
      },
    };

    this.props.onChange({ errors });
    return errors;
  };

  render() {
    const { texts, contact } = this.props;

    return (
      <div style={{ width: this.props.width, float: 'left', padding: '1px' }}>
        { this.props.show_titles ? <h5 style={{ color: '#3C515F', paddingBottom: '20px' }}>{texts.step_contact_text}</h5> : '' }
        <div className="row">
          <div className="form-group col-12-l">
            <input
              type="text"
              className={`form-control ${this.inputErrStyle('name')}`}
              placeholder={texts.placeholder_name}
              onChange={this.handleChange.bind(null, 'name')}
              value={contact.name}
            />

            <span className={this.showErr('name')}>
              {texts.validation_name}
            </span>
          </div>

          <div className={this.props.inline ? 'form-group col-6-l' : 'form-group col-12-l'}>
            <input
              type="text"
              className={`form-control ${this.inputErrStyle('email')}`}
              placeholder={texts.placeholder_email}
              onChange={this.handleChange.bind(null, 'email')}
              value={contact.email}
            />
            <span className={this.showErr('email')}>
              {texts.validation_email}
            </span>
          </div>

          <div className={this.props.inline ? 'form-group col-6-l' : 'form-group col-12-l'}>
            <select
              type="text"
              className="form-control"
              placeholder={texts.placeholder_country}
              onChange={this.handleChange.bind(null, 'country')}
              value={contact.country || texts.country}
            >
              {this.props.countries.map((country, i) => <option key={i} value={country}>{country}</option>)}
            </select>
          </div>
        </div>
      </div>
    );
  }
}

Contact.propTypes = {
  countries: PropTypes.array,
  errors: PropTypes.object,
  texts: PropTypes.object,
  contact: PropTypes.object,
  width: PropTypes.string,
  show_titles: PropTypes.string,
  inline: PropTypes.bool,
  onChange: PropTypes.func.isRequired,
};

export default Contact;
