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
    console.log('handlepdf');
    const isValid = await this.isValid();
    console.log('isValid', isValid);
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
        <div className="col-sm-9">

          <div className="input-container col-sm-6">
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

          <div className="input-container col-sm-6">
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
              <div className={errors.email ? 'input-error' : 'hidden'}>
                {texts.terms_text_valid}
              </div>
          </div>
        </div>
        <div className="col-sm-3">
          <button onClick={this.handlepdf} style={btnStyle}>{btn.text}</button>
        </div>
        <style jsx>{` 
        .download-pdf button{ width: 100%;  }
        .download-pdf input[type='checkbox'] {
          width: auto;
          height:auto;
        }
        .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
            float: left;
          }
          .col-sm-12 {
            width: 100%;
          }
          .col-sm-11 {
            width: 91.66666667%;
          }
          .col-sm-10 {
            width: 83.33333333%;
          }
          .col-sm-9 {
            width: 75%;
          }
          .col-sm-8 {
            width: 66.66666667%;
          }
          .col-sm-7 {
            width: 58.33333333%;
          }
          .col-sm-6 {
            width: 50%;
          }
          .col-sm-5 {
            width: 41.66666667%;
          }
          .col-sm-4 {
            width: 33.33333333%;
          }
          .col-sm-3 {
            width: 25%;
          }
          .col-sm-2 {
            width: 16.66666667%;
          }
          .col-sm-1 {
            width: 8.33333333%;
          }
          .col-sm-pull-12 {
            right: 100%;
          }
          .col-sm-pull-11 {
            right: 91.66666667%;
          }
          .col-sm-pull-10 {
            right: 83.33333333%;
          }
          .col-sm-pull-9 {
            right: 75%;
          }
          .col-sm-pull-8 {
            right: 66.66666667%;
          }
          .col-sm-pull-7 {
            right: 58.33333333%;
          }
          .col-sm-pull-6 {
            right: 50%;
          }
          .col-sm-pull-5 {
            right: 41.66666667%;
          }
          .col-sm-pull-4 {
            right: 33.33333333%;
          }
          .col-sm-pull-3 {
            right: 25%;
          }
          .col-sm-pull-2 {
            right: 16.66666667%;
          }
          .col-sm-pull-1 {
            right: 8.33333333%;
          }
          .col-sm-pull-0 {
            right: auto;
          }
          .col-sm-push-12 {
            left: 100%;
          }
          .col-sm-push-11 {
            left: 91.66666667%;
          }
          .col-sm-push-10 {
            left: 83.33333333%;
          }
          .col-sm-push-9 {
            left: 75%;
          }
          .col-sm-push-8 {
            left: 66.66666667%;
          }
          .col-sm-push-7 {
            left: 58.33333333%;
          }
          .col-sm-push-6 {
            left: 50%;
          }
          .col-sm-push-5 {
            left: 41.66666667%;
          }
          .col-sm-push-4 {
            left: 33.33333333%;
          }
          .col-sm-push-3 {
            left: 25%;
          }
          .col-sm-push-2 {
            left: 16.66666667%;
          }
          .col-sm-push-1 {
            left: 8.33333333%;
          }
          .col-sm-push-0 {
            left: auto;
          }
          .col-sm-offset-12 {
            margin-left: 100%;
          }
          .col-sm-offset-11 {
            margin-left: 91.66666667%;
          }
          .col-sm-offset-10 {
            margin-left: 83.33333333%;
          }
          .col-sm-offset-9 {
            margin-left: 75%;
          }
          .col-sm-offset-8 {
            margin-left: 66.66666667%;
          }
          .col-sm-offset-7 {
            margin-left: 58.33333333%;
          }
          .col-sm-offset-6 {
            margin-left: 50%;
          }
          .col-sm-offset-5 {
            margin-left: 41.66666667%;
          }
          .col-sm-offset-4 {
            margin-left: 33.33333333%;
          }
          .col-sm-offset-3 {
            margin-left: 25%;
          }
          .col-sm-offset-2 {
            margin-left: 16.66666667%;
          }
          .col-sm-offset-1 {
            margin-left: 8.33333333%;
          }
          .col-sm-offset-0 {
            margin-left: 0%;
          }
          `}
              
        </style>
      </form>
    );
  }
}

export default DownloadPdf;
