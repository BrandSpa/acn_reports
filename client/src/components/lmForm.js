import React, { Component } from 'react';
import request from 'axios';
import qs from 'qs';
import isEmpty from 'validator/lib/isEmpty';
import isEmail from 'validator/lib/isEmail';
import PropTypes from 'prop-types';

class lmForm extends Component {

  state = {
    name: '',
    lastname: '',
    email: '',
    country: 'España',
    otherCountry: '',
    postalCode: '',
    province: this.props.provinces[0],
    errors: {},
    complete: false,
  }


  handleChange = (e) => {
    this.setState({ [e.target.name]: e.target.value });
  }

  validate = () => {
    const fields = ['name', 'lastname', 'email', 'country'];
    const errors = {};

    fields.forEach((field) => {
      const val = this.state[field];
      errors[field] = field === 'email' ? !isEmail(val) : isEmpty(val);
    });

    this.setState({ errors });

    return fields
      .map((key) => {
        const val = this.state[key];
        return key === 'email' ? isEmail(val) : !isEmpty(val);
      });
  }

  handleSubmit = async (e) => {
    if (e) e.preventDefault();

    if (this.validate().every(item => item === true)) {
      const data = qs.stringify({ action: 'send_lm', data: this.state });
      const res = await request.post('/wp-admin/admin-ajax.php', data);
      if (Number.isInteger(res.data)) {
        this.setState({ complete: true });
      }
    }
  }

  render() {
    const { name, lastname, email, country, otherCountry, postalCode, province, errors } = this.state;
    const { placeholders, messages, btnText, provinces } = this.props;

    if (this.state.complete) {
      return (
        <div>
          <h4 style={{ color: '#3c515f' }}>{messages.thanks}</h4>
        </div>
      );
    }

    return (
      <form action="#" onSubmit={this.handleSubmit}>
        <div className="input-container">
          <input
            type="text"
            name="name"
            placeholder={placeholders.name}
            onChange={this.handleChange}
            value={name}
          />
          <div className={errors.name ? 'input-error' : 'hidden'}>
            {messages.name}
          </div>
        </div>
        <div className="input-container">
          <input
            type="text"
            name="lastname"
            placeholder={placeholders.lastname}
            onChange={this.handleChange}
            value={lastname}
          />
          <div className={errors.lastname ? 'input-error' : 'hidden'}>
            {messages.lastname}
          </div>
        </div>
        <div className="input-container">
          <input
            type="text"
            name="email"
            placeholder={placeholders.email}
            onChange={this.handleChange}
            value={email}
          />
          <div className={errors.email ? 'input-error' : 'hidden'}>
            {messages.email}value={name}
          </div>
        </div>
        <div className="input-container">
          <label>
            {placeholders.country}
            <select
              name="country"
              value={country}
              onChange={this.handleChange}
              placeholder={placeholders.country}
            >
              <option value="España">España</option>
              <option value="Otro">Otro</option>
            </select>
          </label>
          <div className={errors.country ? 'input-error' : 'hidden'}>
            {messages.country}
          </div>
        </div>
        {country === 'Otro' ?
          <div className="input-container">
            <input
              type="text"
              name="otherCountry"
              placeholder={placeholders.country}
              onChange={this.handleChange}
              value={otherCountry}
            />
            <div className={errors.otherCountry ? 'input-error' : 'hidden'}>
              {messages.otherCountry}
            </div>
          </div>
          :
          ''
        }
        {country === 'España' ?
          <div className="input-container">
            <input
              type="text"
              name="postalCode"
              placeholder={placeholders.postal_code}
              onChange={this.handleChange}
              value={postalCode}
            />
            <div className={errors.postalCode ? 'input-error' : 'hidden'}>
              {messages.postalCode}
            </div>
          </div>
          :
          ''
        }
        {country === 'España' ?
          <div className="input-container">
            <label>
              {placeholders.province}
              <select
                name="province"
                value={province}
                onChange={this.handleChange}
                placeholder={placeholders.province}
              >
                {provinces.map(province, () => <option value={province}>{province}</option>)}
              </select>
            </label>
            <div className={errors.province ? 'input-error' : 'hidden'}>
              {messages.province}
            </div>
          </div>
          :
          ''
        }
        <button>{btnText}</button>
      </form>
    );
  }
}

lmForm.propTypes = {
  placeholders: PropTypes.object.isRequired,
  messages: PropTypes.object.isRequired,
  btnText: PropTypes.string.isRequired,
  provinces: PropTypes.array.isRequired,
};

export default lmForm;
