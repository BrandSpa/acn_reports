import React from 'react';
import request from 'axios';
import qs from 'qs';
import isEmail from 'validator/lib/isEmail';
import getCountries from '../lib/getCountries';
import { storeEvent } from '../lib/events';
import { storeConvertLoop } from '../actions/contact';

const endpoint = '/wp-admin/admin-ajax.php';

class DownloadPdf extends React.Component {
  static defaultProps = {
    btn: {
      text: '',
      background: '',
    },
    texts: {},
    countries: getCountries,
    pdf_url: '',
  };

  constructor(props) {
    super(props);
    const { country } = props;

    this.state = {
      email: '',
      errors: {
        email: false,
      },
      country,
    };
  }

  validate = () => {
    let errors = {};

    const validations = Object.keys(this.state.errors).map((field) => {
      const val = !isEmail(this.state[field]);
      errors = { ...errors, [field]: val };
      return val;
    });

    this.setState({ errors });

    return Promise.all(validations);
  };

  isValid = () => this.validate()
      .then(arr => arr.every(item => item == false))
      .catch(err => console.error(err));

  handlepdf = async (e) => {
    e.preventDefault();
    const isValid = await this.isValid();
    this.storeContact(isValid);
  };

  storeContact = async (isValid) => {
    const { redirect_url, event, tags } = this.props;
    const { email, country } = this.state;
    const contact = { email, country };

    if (isValid) {
      try {
        await storeConvertLoop(tags, contact);
        const language = window.bs.currentPageLang === 'Español' ? 'SP' : 'EN';

        const gaEventData = { category: 'SUBSCRIBE', action: event, label: `${event}_${language}` };
        await storeEvent('ga_event', gaEventData);

        const clEventData = { name: event, person: contact };
        await storeEvent('cl_event', clEventData);

        const fbEventData = { eventName: 'Lead' };
        await storeEvent('fb_event', fbEventData);

        setTimeout(() => window.location = redirect_url, 0);
      } catch (err) {
        console.log(err);
      }
    }
  }

  handleChange = (e, field) => {
    this.setState({ ...this.state, [field]: e.target.value });
  }

  render() {
    const { countries, btn, texts } = this.props;
    const { errors } = this.state;

    console.log(this.props);

    const btnStyle = {
      borderColor: btn.background,
      background: btn.background,
    };

    return (
      <form onSubmit={this.handlepdf} className="form-inline download-pdf">
        <div className="input-container">
          <input
            type="text"
            placeholder={texts.email}
            onChange={e => this.handleChange(e, 'email')}
            value={this.state.email}
          />

          <div className={errors.email ? 'input-error' : 'hidden'}>
            {errors.email} {texts.validation_email}
          </div>
        </div>

        <div className="input-container">
          <select
            onChange={e => this.handleChange(e, 'country')}
            value={this.state.country || this.props.country}
          >
            {countries.map((country, i) => (
              <option key={i} value={country}>{country}</option>
            ))}
          </select>
        </div>
        <button onClick={this.handlepdf} style={btnStyle}>{btn.text}</button>
      </form>
    );
  }
}

export default DownloadPdf;
