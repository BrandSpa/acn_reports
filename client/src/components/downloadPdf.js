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
      terms: true,
      errors: {
        email: false,
        terms: false
      },
      country,
    };
  }

  validateEmail = (email) => {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

  isValid = () => {

    const p = new Promise((resolve) => {

      const errors = Object.keys(this.state.errors).reduce((obj, field) => {
        if(field == 'email'){
          const v = this.validateEmail(this.state[field]);
          obj[field] = !v;
        }
        
        if(field == 'terms'){
          obj[field] = this.state.terms === false;
        }
        return obj;
      }, {});
  
      this.setState({ errors });
  
      const invalid = Object.keys(errors).some(err => errors[err]);

      return resolve(!invalid);

    });
  
    return p;

  }

  handlepdf = async (e) => {
    e.preventDefault();
    const isValid = await this.isValid();
    this.storeContact(isValid);
  };

  storeContact = async (isValid) => {
    const { redirect_url, event, tags } = this.props;
    const { email, country } = this.state;
    const contact = { email, country, 'Subscribe': this.state.terms ? 'Yes': 'No' };
    
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
  handleTermsChange = (e) => {
    this.state.terms = !this.state.terms;
  }
  handleChange = (e, field) => {
    this.setState({ ...this.state, [field]: e.target.value });
  }

  render() {
    const { countries, btn, texts } = this.props;
    const { errors } = this.state;
    const btnStyle = {
      borderColor: btn.background,
      background: btn.background,
    };

    return (
      <form onSubmit={this.handlepdf} className="form-inline download-pdf">
        <div className="row">
        <div className="row fields col-sm-12 col-md-9">
          <div className="input-container col-sm-12 col-md-6">
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

          <div className="input-container col-sm-12 col-md-6">
            <select
              onChange={e => this.handleChange(e, 'country')}
              value={this.state.country || this.props.country}
            >
              {countries.map((country, i) => (
                <option key={i} value={country}>{country}</option>
              ))}
            </select>
          </div>
          <div className="input-container col-sm-12">
              <label> <input type="checkbox" defaultChecked={this.state.terms} onChange={e => this.handleTermsChange(e)} /> {texts.terms_text}</label>
              <div className={errors.terms ? 'input-error' : 'hidden'}>
                {texts.terms_text_valid}
              </div>
          </div>
          </div>
          <div className="container-download-btn col-sm-12 col-md-3">
              <div className="col-xs-12">
                <button class="btn_downloadpdf" onClick={this.handlepdf} style={btnStyle}>{btn.text}</button>
              </div>
          </div>
        </div>
        
        <style jsx>{` 
          .download-pdf button{ width: 100%;  }
          .download-pdf input[type='checkbox'] {
            width: auto;
            height:auto;
          }
          `}
              
        </style>
      </form>
    );
  }
}

export default DownloadPdf;
