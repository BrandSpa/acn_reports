import React, { Component } from 'react';
import isEmpty from 'validator/lib/isEmpty';
import isEmail from 'validator/lib/isEmail';
import PropTypes from 'prop-types';
import getCountries from '../lib/getCountries';
import { storeEvent } from '../lib/events';
import { storeConvertLoop } from '../actions/contact';

class contactForm extends Component {

  static defaultProps = {
    validationMessages: {},
    placeholders: {},
    texts: {},
    redirect: '',
    btnBg: '',
    cl: {
      event: 'Subscription',
      tags: '',
    },
    vertical: false,
    terms: '',
  }

  state = {
    contact: {
      name: '',
      lastname: '',
      email: '',
      country: '',
    },
    errors: { 
      name: false, 
      lastname: false, 
      email: false 
    },
    countries: getCountries,
    officeCountries: [],
    inOffice: false,
    loading: false,
    showMemberExists: false,
    terms: true,
  }

  componentDidMount() {
    this.setCountry();
  }

  setCountry = () => {
    const countries = this.props.countries;
    this.setState({
      contact: {
        ...this.state.contact,
        country: this.props.country,
      },
      officeCountries: countries,
      inOffice: countries.indexOf(this.props.country) !== -1,
    });
  }

  checkEmpty = (field) => {
    const hasField = this.state.contact.hasOwnProperty(field)
      ? isEmpty(this.state.contact[field])
      : false;
    return hasField;
  }

  validate = () => {
    const { contact } = this.state;
    let errors = {};
    const name = isEmpty(contact.name);
    const lastname = isEmpty(contact.lastname);
    const email = !isEmail(contact.email);

    errors = { ...errors, name, lastname, email };

    let validations = Object.keys(errors).map(key => errors[key]);

    if (this.props.terms === 'true') {
      if (this.state.terms === false) {
        errors = { ...errors, terms: true };
        validations = validations.concat(true);
      }
    }

    this.setState({ errors });

    return Promise.all(validations);
  }

  isValid = () => {
    const valid = this.validate()
      .then(arr => arr.every(item => item === false))
      .catch(err => console.log(err));
    return valid;
  }

  handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const isValid = await this.isValid();
      this.storeContact(isValid);
    } catch(err) {
      console.log(err)
    }
  }

  storeContact = async (isValid) => {
    const { cl, redirect } = this.props;
    const { contact } = this.state;

    if (isValid === true) {
      this.setState({ loading: true });
      try {
        await storeConvertLoop(cl.tags, contact);
        const language = window.bs.currentPageLang === 'Español' ? 'SP' : 'EN';
  
        const gaEventData = { category: 'SUBSCRIBE', action: 'SUBSCRIBE_PRAY', label: `PRAY_${language}` };
        await storeEvent('ga_event', gaEventData);
  
        const clEventData = { name: cl.event, person: contact };
        await storeEvent('cl_event', clEventData);
  
        const fbEventData = { eventName: 'Lead' };
        await storeEvent('fb_event', fbEventData);
  
        setTimeout(() => window.location = redirect, 0);
      } catch(err) {
        console.log(err);
      }
    }
  }

  handleChange = (e, field) => {
    const contact = { ...this.state.contact, [field]: e.target.value };
    this.setState({ contact });
  }

  handleCheckbox = () => {
    this.setState({ terms: !this.state.terms });
  }

  render() {
    const { contact, errors } = this.state;
    const { placeholders, validationMessages, texts } = this.props;

    const inputContainerStyle = {
      width: this.props.vertical === 'true' ? '100%' : '20%',
    };

    const inputStyle = {
      borderRadius: this.props.vertical === 'true' ? '0' : '',
    };

    return (
      <form
        style={{ textAlign: 'center' }}
        className="form-inline contact-form"
        onSubmit={this.handleSubmit}
      >
        <div style={inputContainerStyle} className="input-container">
          <input
            type="text"
            placeholder={placeholders.name}
            onChange={e => this.handleChange(e, 'name')}
            value={contact.name}
            style={inputStyle}
          />
          <div className={errors.name ? 'input-error' : 'hidden'}>
            {errors.name} {validationMessages.name}
          </div>
        </div>
        <div style={inputContainerStyle} className="input-container">
          <input
            type="text"
            placeholder={placeholders.lastname}
            onChange={e => this.handleChange(e, 'lastname')}
            value={contact.lastname}
            style={inputStyle}
          />
          <div className={errors.lastname ? 'input-error' : 'hidden'}>
            {validationMessages.lastname}
          </div>
        </div>
        <div style={inputContainerStyle} className="input-container">
          <input
            type="text"
            placeholder={placeholders.email}
            onChange={e => this.handleChange(e, 'email')}
            value={contact.email}
            style={inputStyle}
          />
          <div className={errors.email ? 'input-error' : 'hidden'}>
            {validationMessages.email}
          </div>
        </div>
        <div style={inputContainerStyle} className="input-container">
          <select
            onChange={e => this.handleChange(e, 'country')}
            value={contact.country}
          >
            <option value="">{texts.select_country}</option>
            {this.state.countries.map(country => (
              <option key={country} value={country}>{country}</option>
            ))}
          </select>
        </div>

        <button
          style={{
            marginLeft: '-2px',
            background: this.props.btnBg,
            color: '#fff',
          }}
          className="btn"
          onClick={this.handleSubmit}
          disabled={this.state.loading}
        >
          {texts.button} {this.state.loading ? '...' : ''}
        </button>
        {this.props.terms === 'true' &&
          <div className="checkbox">
            <label htmlFor="terms">
              <input 
                id="terms" 
                type="checkbox" 
                onChange={this.handleCheckbox} 
                checked={this.state.terms} /> {this.props.texts.terms}
            </label>
          </div>
        }
        <div className="input-container">
          <div className={errors.terms ? 'input-error' : 'hidden'}>
            {validationMessages.terms}
          </div>
        </div>

        <span
          className="message"
          style={this.state.showMemberExists ? { display: 'inline-block' } : { display: 'none' }}
        >
          {"you're already praying"}
        </span>
        <style jsx>{`
          .message {
            color: #fff;
            width: 90%;
            padding: 10px;
            margin: 5px auto;
            background: #f4334a;
          }
          `}</style>
      </form>
    );
  }
}

contactForm.propTypes = {
  countries: PropTypes.array.isRequired,
  country: PropTypes.string.isRequired,
  placeholders: PropTypes.object,
  validationMessages: PropTypes.object,
  cl: PropTypes.object,
  texts: PropTypes.object,
  terms: PropTypes.bool,
  btnBg: PropTypes.string,
  redirect: PropTypes.string,
  vertical: PropTypes.bool,
};

export default contactForm;
