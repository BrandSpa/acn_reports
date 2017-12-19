import React, { Component } from 'react';
import PropTypes from 'prop-types';
import AmountBtns from './amountBtns';
import { onlyNum } from '../../lib/clean_inputs';

class Amount extends Component {
  static defaultProps = {
    texts: {},
    amount: 30,
    show_titles: false,
    donation_type: 'monthly',
  };

  changeAmount = (e, amount) => {
    if (e) e.preventDefault();
    const el = this.amountInput;
    if (amount === 5) el.focus();
    this.props.onChange({ amount });
  };

  handleAmount = (e) => {
    const val = e.currentTarget.value;
    const amount = onlyNum(val);
    this.props.onChange({ amount });
  };

  changeType = (e, donation_type) => {
    if (e) e.preventDefault();
    this.props.onChange({ donation_type });
  };

  render() {
    const { texts, donation_type, amount, width, show_titles } = this.props;

    return (
      <div style={{ width, float: 'left', padding: '1px' }}>
        { show_titles && <h5>{texts.step_amount_text}</h5>}
        <AmountBtns
          amount={amount}
          texts={texts}
          changeAmount={this.changeAmount}
        />
        <div className="row">
          <div className="form-group form-group--addon col-5-l">
            <span className="form-group__addon">
              US$
            </span>
            <input
              ref={amountInput => (this.amountInput = amountInput)}
              className="form-control"
              type="text"
              onChange={this.handleAmount}
              value={amount}
            />
          </div>
          <div className="form-group col-7-l">
            <a
              href="#"
              onClick={e => this.changeType(e, 'monthly')}
              className={
                donation_type === 'monthly'
                  ? 'donate_react__type donate_react__type--active'
                  : 'donate_react__type '
              }
            >
              {texts.monthly}
            </a>
            <a
              href="#"
              onClick={e => this.changeType(e, 'once')}
              className={
                donation_type === 'once'
                  ? 'donate_react__type donate_react__type--active'
                  : 'donate_react__type '
              }
            >
              {texts.once}
            </a>
          </div>
        </div>
        <style jsx>{`
          h5 {
            color: #3C515F;
            padding-bottom: 20px;
          }
        `}</style>
      </div>
    );
  }
}

Amount.propTypes = {
  onChange: PropTypes.func.isRequired,
  width: PropTypes.string.isRequired,
  texts: PropTypes.object,
  donation_type: PropTypes.string,
  amount: PropTypes.number,
  show_titles: PropTypes.bool,
};

export default Amount;
