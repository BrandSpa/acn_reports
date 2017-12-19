import React, { Component } from 'react';
import PropTypes from 'prop-types';
import Amount from './amount';
import CreditCard from './creditCard';
import Contact from './contact';
import * as actions from '../../actions/donate';
import { storeEvent } from '../../lib/events';

function isAllValid(errors = {}) {
  return Object.keys(errors).every(key => errors[key] === true);
}

class Donate extends Component {
  static defaultProps = {
    texts: {},
    redirect: {},
  };

  state = {
    section: 0,
    loading: false,
    donation_type: 'monthly',
    amount: 30,
    currency: 'usd',
    contact: {
      name: '',
      email: '',
      country: this.props.texts.country,
    },
    stripe: {
      card_type: '',
      number: '',
      exp_month: '',
      exp_year: '',
      cvc: '',
      token: '',
    },
    errors: { stripe: {}, contact: {} },
    is_blue: false,
    show_four_step: false,
    show_titles: false,
  };

  componentDidMount() {
    if (this.donateForm) {
      this.donateForm.addEventListener('keydown', (e) => {
        if (e.which === 9) {
          e.preventDefault();
          this.nextSection();
        }
      });
    }
  }

  handleChange = (field) => {
    this.setState({ ...this.state, ...field });
  };

  handleSubmit = (e) => {
    e.preventDefault();
    this.nextSection();
  }

  completeTransaction = async () => {
    const { amount, donation_type, contact } = this.state;

    const base = this.props.redirect[donation_type];

    this.setState({ loading: true });

    try {
      const stripeCharge = await actions.stripeCharge(this.state);
      const { id } = stripeCharge.data;
      await actions.storeConvertLoop(this.props.tags, this.state.contact);
      const action = donation_type === 'monthly'
      ? 'DONATION_MONTHLY'
      : 'DONATION_UNIQUE';

      const label = window.bs.currentPageLang === 'Español'
      ? 'DONATION_SP'
      : 'DONATION_EN';

      const gaEvent = {
        action,
        label,
        category: 'DONATION',
        value: amount,
      };

      await storeEvent('ga_event', gaEvent);

      const clEvent = {
        name: `Donation ${donation_type}`,
        person: contact,
        metadata: {
          amount,
          type: donation_type,
          url: window.location.href,
        },
      };

      await storeEvent('cl_event', clEvent);

      const fbEvent = {
        eventName: 'Purchase',
        content: { value: amount, currency: 'USD' },
      };

      await storeEvent('fb_event', fbEvent);

      const gaEcommerceEvent = {
        customerId: `${contact.email}-${id}`,
        revenue: amount,
      };

      await storeEvent('ga_ecm_event', gaEcommerceEvent);

      const url = `${base}?amount=${amount}&personname=${contact.name}&donation_type=${donation_type}`;

      setTimeout(() => window.location = url, 0);
    } catch (err) {
      console.log('err donate', err);
    }
  }

  creditCardIsValid = () => {
    const errs = this.creditCard.validateAll();
    return isAllValid(errs.stripe);
  }

  contactIsValid = () => {
    const errs = this.contact.validateAll();
    return isAllValid(errs.contact);
  }

  getToken = async () => {
    try {
      const stripeToken = await actions.stripeToken(this.state);

      if (stripeToken.id) {
        const stripe = { ...this.state.stripe, token: stripeToken.id };
        this.setState({ ...this.state, stripe });
      }

      if (stripeToken.stripeCode) {
        this.setState({ ...this.state, loading: false, declined: true });
        return false;
      }
    } catch (err) {
      console.log('donate get token err', err);
    }
  }

  nextSection = () => {
    const section = this.state.section < 2 ? this.state.section + 1 : 2;

    if (this.state.section === 1) {
      if (!this.creditCardIsValid()) return false;
      this.getToken();
    }

    if (this.state.section === 2) {
      if (!this.contactIsValid()) return false;
      this.completeTransaction();
    }

    this.setState({ section, loading: false });

    return section;
  };

  prevSection = (e) => {
    e.preventDefault();
    const section = this.state.section >= 0 ? this.state.section - 1 : 0;
    this.setState({ section });
  };

  render() {
    const { section } = this.state;
    const sectionWidth = `${100 / 3}%`;
    const viewPortStyle = { width: '300%', left: `-${section * 100}%` };
    const donationTypeStyle = {
      color: this.props.is_blue ? 'rgb(60, 81, 95)' : '#fff',
    };

    const backBtnStyle = {
      color: this.props.is_blue ? 'rgb(60, 81, 95)' : '#fff',
    };

    return (
      <form
        onSubmit={this.handleSubmit}
        className={
            this.props.is_blue ? 'donate_react donate_inline' : 'donate_react'
          }
        ref={donate => (this.donateForm = donate)}
      >
        <div className="donate_react__viewport" style={viewPortStyle}>

          <Amount
            {...this.state}
            {...this.props}
            width={sectionWidth}
            onChange={this.handleChange}
          />

          <CreditCard
            ref={creditCard => (this.creditCard = creditCard)}
            {...this.state}
            {...this.props}
            width={sectionWidth}
            onChange={this.handleChange}
          />

          <Contact
            ref={contact => (this.contact = contact)}
            {...this.state}
            {...this.props}
            width={sectionWidth}
            onChange={this.handleChange}
          />

        </div>

        <div className="form-group">
          <button
            className="donate_react__submit pull-left"
            onClick={this.handleSubmit}
            disabled={this.state.loading}
          >
            {this.state.section === 1
                ? this.props.texts.next
                : this.props.texts.donate}
            {' '}
            {this.state.loading ? '...' : ''}
          </button>
          <span className="donation-type" style={donationTypeStyle}>
            {`${this.state.amount} USD ${this.props.texts[this.state.donation_type]}`}
          </span>
          {this.state.section > 0 &&
            <button className="back-btn" style={backBtnStyle} onClick={this.prevSection}>
                {this.props.texts.back}
              </button>
            }
        </div>
        <div
          className="decline"
          style={this.state.declined ? { display: 'block' } : { display: 'none' }}
        >
          {this.props.texts.validation_declined}
        </div>
        <style jsx>{`
          .decline {
            background: red;
            color: #fff;
            float: left;
            width: 100%;
            padding: 10px;
          }

          .donation-type {
            display: inline;
            marginLeft: 15px;
          }

          .back-btn {
            float: right;
            background: transparent;
            border: none;
            padding: 0 20px;
          }
        `}</style>

      </form>
    );
  }
}

Donate.propTypes = {
  texts: PropTypes.object,
  redirect: PropTypes.object,
  is_blue: PropTypes.string.isRequired,
};

export default Donate;
