import React from 'react';
import validCard from 'card-validator';
import PropTypes from 'prop-types';
import Cards from './cards';
import { onlyNum, maxLength } from '../../lib/clean_inputs';

class CredritCard extends React.Component {
  static defaultProps = {
    texts: {},
    stripe: {},
    errors: {},
  };

  state = {
    showPopover: false,
  };

  getCardType = (cardNum) => {
    const isValid = validCard.number(cardNum).card ? validCard.number(cardNum).card.type : null;
    return isValid;
  }

  validateCard = (card) => {
    const number = validCard.number(card).isValid;
    return this.updateErrors({ number });
  };

  validateCvc = (cvc) => {
    const isValid = cvc.length >= 3;
    return this.updateErrors({ cvc: isValid });
  };

  updateErrors = field => ({ ...this.props.errors, stripe: field });

  handleCard = (e) => {
    const val = e.currentTarget.value;
    let number = onlyNum(val);
    number = maxLength(number, 16);
    const errors = this.validateCard(number);
    const card_type = this.getCardType(number);
    const stripe = { ...this.props.stripe, number, card_type };
    this.props.onChange({ stripe, errors });
  };

  handleExpiry = (type, e) => {
    let { stripe } = this.props;
    let val = onlyNum(e.currentTarget.value);
    val = maxLength(val, 2);
    let exp_month = stripe.exp_month;
    let exp_year = stripe.exp_year;
    if (type === 'exp_month') exp_month = val;
    if (type === 'exp_year') exp_year = val;
    const errors = this.validateExpiry(exp_month, exp_year);
    stripe = { ...stripe, exp_month, exp_year };

    this.props.onChange({ stripe, errors });
  };

  validateExpiry = (month, year) => {
    const valid = validCard.expirationDate({ month, year });
    const exp_month = valid.isValid;
    const exp_year = valid.isValid;
    return this.updateErrors({ exp_month, exp_year });
  };

  handleCvc = (e) => {
    let { stripe } = this.props;
    let cvc = onlyNum(e.currentTarget.value);
    cvc = maxLength(cvc, 4);
    stripe = { ...stripe, cvc };
    const errors = this.validateCvc(cvc);
    this.props.onChange({ stripe, errors });
  };

  showErr = (field) => {
    if (this.props.errors.stripe) {
      return this.props.errors.stripe[field] === false
        ? 'form-group__error'
        : 'hidden';
    }

    return '';
  };

  inputErrStyle = (field) => {
    if (this.props.errors.stripe) {
      return this.props.errors.stripe[field] === false
        ? 'form-group--error'
        : '';
    }

    return '';
  };

  validateAll = (e) => {
    if (e) e.preventDefault();
    const { stripe } = this.props;
    const number = this.validateCard(stripe.number);
    const exp_month = this.validateExpiry(stripe.exp_month, stripe.exp_year);
    const cvc = this.validateCvc(stripe.cvc);

    const errors = {
      ...this.props.errors,
      stripe: { ...number.stripe, ...exp_month.stripe, ...cvc.stripe },
    };

    this.props.onChange({ errors });

    return errors;
  };

  togglePopover = () => {
    this.setState({ showPopover: !this.state.showPopover });
  };

  render() {
    const { texts, stripe } = this.props;

    return (
      <div
        className="donate_react__creditcard"
        style={{ width: this.props.width, float: 'left', padding: '1px' }}
      >
        { this.props.show_titles && <h5>{texts.step_payment_text}</h5> }
        <Cards {...this.props} />
        <div className="form-group">
          <input
            type="text"
            placeholder={texts.placeholder_credit_card}
            className={`form-control ${this.inputErrStyle('number')}`}
            onChange={this.handleCard}
            value={stripe.number}
          />
          <span className={this.showErr('number')}>
            {texts.validation_card}
          </span>
        </div>
        <div className="row donate_react__creditcard__row">
          <div className="form-group col-4-l col-4">
            <input
              type="text"
              placeholder={texts.placeholder_month}
              className="form-control"
              onChange={e => this.handleExpiry('exp_month', e)}
              value={stripe.exp_month}
            />
            <span className={this.showErr('exp_month')}>
              {texts.validation_month}
            </span>
          </div>
          <div className="form-group col-4-l col-4">
            <input
              type="text"
              placeholder={texts.placeholder_year}
              className="form-control"
              onChange={e => this.handleExpiry('exp_year', e)}
              value={stripe.exp_year}
            />
            <span className={this.showErr('exp_year')}>
              {texts.validation_year}
            </span>
          </div>

          <div className="form-group col-4-l col-4">
            <input
              type="text"
              placeholder={texts.placeholder_cvc}
              className="form-control"
              onChange={this.handleCvc}
              value={stripe.cvc}
            />
            <span
              className="cvc-help"
              onClick={this.togglePopover}
            >
              <i className="ion-help" />
            </span>
            <span className={this.showErr('cvc')}>
              {texts.validation_cvc}
            </span>
          </div>

        </div>

        <div
          style={
            this.state.showPopover
              ? {
                background: '#fff',
                boxShadow: '0 1px 3px 0 rgba(0,0,0,0.26)',
                borderRadius: '2px',
                textAlign: 'center',
                display: 'block',
                margin: '15px 0',
                position: 'relative',
                zIndex: '100',
              }
              : { display: 'none' }
          }
        >

          <a
            href="#"
            className="cvc-close"
            onClick={this.togglePopover}
          >
            <i className="ion-close" />
          </a>

          <span
            className="cvc-explain"
          >
            {texts.explain_cvc}
          </span>
          <img
            width="60px"
            src={`${texts.template_uri}/public/img/cvc.png`}
            alt=""
          />
        </div>
        <style jsx>{`
          h5 {
            color: #3C515F; 
            padding-bottom: 20px 
          }

          .cvc-help {
            display: block;
            background: #3C515F;
            width: 20px;
            height: 20px;
            borderRadius: 20px;
            color: #fff;
            textAlign: center;
            position: absolute;
            top: 12px;
            right: 25px;
            cursor: pointer;
          }

          .cvc-explain {
            display: block;
            color: #3C515F;
            padding: 10px;
            fontSize: 14px;
          }

          .cvc-close {
            display: block;
            position: absolute;
            top: 2px;
            right: 2px;
            width: 15px;
            height: 15px;
            color: red;
            cursor: pointer;
          }
          `}</style>
      </div>
    );
  }
}

CredritCard.propTypes = {
  stripe: PropTypes.object.isRequired,
  errors: PropTypes.object.isRequired,
  texts: PropTypes.object.isRequired,
  onChange: PropTypes.func.isRequired,
  show_titles: PropTypes.string.isRequired,
  width: PropTypes.string.isRequired,
};

export default CredritCard;
