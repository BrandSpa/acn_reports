import React, { Component } from 'react';
import Amount from './amount';
import CreditCard from './creditCard';
import Contact from './contact';
import FourStep from './four';
import * as actions from '../../actions/donate';
import { storeEvent } from '../../lib/events';

function isAllValid(errors = {}) {
  return Object.keys(errors).every(key => errors[key] == true);
}

class DonateInline extends Component {
  static defaultProps = { texts: {}, redirect: {} };

  state = {
    section: 0,
    left: 0,
    loading: false,
    donation_type: 'monthly',
    amount: 30,
    currency: 'usd',
    contact: { name: '', email: '', country: '' },
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
    show_four: false,
    show_titles: false,
  };

  componentDidMount() {
    if (this.donateForm) {
      this.donateForm.addEventListener('keydown', (e) => {
        if (e.which == 9) {
          e.preventDefault();
          this.handleSubmit();
        }
      });
    }
  }

  handleChange = (field) => {
    this.setState({ ...this.state, ...field });
  };

  creditCardIsValid = () => new Promise((resolve, reject) => {
    const errs = this.creditCard.validateAll();
    const isValid = isAllValid(errs.stripe);
    return resolve(isValid);
  });

  contactIsValid = () => new Promise((resolve, reject) => {
    const errs = this.contact.validateAll();
    const isValid = isAllValid(errs.contact);
    return resolve(isValid);
  });

  handleSubmit = (e) => {
    if (e) e.preventDefault();

    this.contactIsValid()
      .then((res) => {
        if (!res) return false;
      })
      .then(this.creditCardIsValid)
      .then((res) => {
        if (!res) return false;
        this.setState({ loading: true });
        actions.stripeToken(this.state).then((res) => {
          if (res.id) {
            const stripe = { ...this.state.stripe, token: res.id };
            this.setState({ stripe });

            actions
              .stripeCharge({ ...this.state, stripe })
              .then(res => this.completeTransaction(res.data));
          }

          if (res.stripeCode) {
            this.setState({ loading: false, declined: true });
          }
        });
      });
  };

  completeTransaction = (stripeResponse = {}) => {
    const { amount, donation_type, contact } = this.state;
    const { customer, id } = stripeResponse;
    const base = this.props.redirect[donation_type];

    actions
      .storeConvertLoop(this.props.tags, this.state.contact)
      .then(() => {
        const event = {
          category: 'DONATION',
          action: 'DONATION_MONTHLY',
          label: 'DONATION_EN',
          value: amount,
        };
        console.log('ga', event);
        storeEvent('ga_event');
      })
      .then(() => {
        const event = {
          name: `Donation ${donation_type}`,
          person: contact,
          metadata: {
            amount,
            type: donation_type,
            url: window.location.href,
          },
        };
        console.log('cl', event);
        return storeEvent('cl_event', event);
      })
      .then(() => {
        const event = {
          eventName: 'Purchase',
          content: { value: amount, currency: 'USD' },
        };
        console.log('fb', event);
        return storeEvent('fb_event');
      })
      .then(() => {
        const event = {
          customerId: `${contact.email}-${id}`,
          revenue: amount,
        };
        console.log('ga_ecm_event', event);
        return storeEvent('ga_ecm_event', event);
      })
      .then((res) => {
        // const url = `${base}?customer_id=${contact.email}-${id}&order_revenue=${amount}&order_id=${id}`;
        window.location = base;
      });
  };

  render() {
    const sectionWidth = '100%';
    const viewPortStyle = {
      width: '100%',
      left: this.state.left,
      display: 'block',
    };

    const donationTypeStyle = {
      display: 'inline',
      marginLeft: '15px',
      color: this.props.is_blue ? '#3C515F' : '#fff',
    };

    const backBtnStyle = {
      float: 'right',
      background: 'transparent',
      border: 'none',
    };

    console.log('four', this.state.show_four);

    return (
      <div>
        <form
          onSubmit={this.handleSubmit}
          className={
            this.props.is_blue ? 'donate_react donate_inline' : 'donate_react'
          }
          style={this.state.show_four ? { display: 'none' } : { display: 'block' }}
          ref={donate => (this.donateForm = donate)}
        >

          <div className="donate_react__viewport" style={viewPortStyle}>
            <Contact
              ref={contact => (this.contact = contact)}
              {...this.state}
              {...this.props}
              width={sectionWidth}
              inline
              onChange={this.handleChange}
            />

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
          </div>

          <div style={{ marginBottom: '10px' }}>
            <button
              className="donate_react__submit pull-left"
              onClick={this.handleSubmit}
              disabled={this.state.loading}
            >
              {this.props.texts.donate}{this.state.loading ? '...' : ''}
            </button>

            <span style={donationTypeStyle}>
              {`${this.state.amount} USD ${this.props.texts[this.state.donation_type]}`}
            </span>

          </div>
        </form>

        <FourStep {...this.props} {...this.state} />
      </div>
    );
  }
}

export default DonateInline;
