import React, { Component } from 'react';
import request from 'axios';
import qs from 'qs';
import isEmpty from 'validator/lib/isEmpty';
import isEmail from 'validator/lib/isEmail';
import PropTypes from 'prop-types';

class ContactUsForm extends Component {
  state = {
    name: '',
    lastname: '',
    email: '',
    message: '',
    errors: {},
    complete: false,
  }

  handleChange = (e) => {
    this.setState({ [e.target.name]: e.target.value });
  }

  validate = () => {
    const fields = ['name', 'lastname', 'email', 'message'];
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
      const data = qs.stringify({ action: 'send_contact_us', data: this.state });
      const res = await request.post('/wp-admin/admin-ajax.php', data);
      if (Number.isInteger(res.data)) {
        this.setState({ complete: true });
      }
    }
  }

  render() {
    const { name, lastname, email, message, errors } = this.state;
    const { placeholders, messages, btnText } = this.props;

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
            {messages.email}
          </div>
        </div>
        <div className="input-container">
          <textarea
            placeholder={placeholders.message}
            name="message"
            rows="5"
            onChange={this.handleChange}
          >{message}</textarea>
          <div className={errors.message ? 'input-error' : 'hidden'}>
            {messages.message}
          </div>
        </div>
        <button>{btnText}</button>
        <style jsx>{`
         textarea {
           width: 100%;
           background: transparent;
           padding: 6px 12px;
           font-size: .8em;
           border: 1px solid #6A7C82;
         }

         textarea:focus {
          outline: none;
         }
       `}</style>
      </form>
    );
  }
}

ContactUsForm.propTypes = {
  placeholders: PropTypes.object.isRequired,
  messages: PropTypes.object.isRequired,
  btnText: PropTypes.string.isRequired,
};

export default ContactUsForm;
