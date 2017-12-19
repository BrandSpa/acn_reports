import React from 'react';
import propTypes from 'prop-types';

const AmountBtn = ({ changeAmount, amount, amountText }) => (
  <a
    href="#"
    className={amount === amountText ? 'active' : ''}
    onClick={e => changeAmount(e, amountText)}
  >
    ${amountText}
  </a>
);

const AmountBtns = (props) => {
  const { changeAmount, texts = {}, amount = 30 } = props;

  return (
    <ul className="change-amount" style={{ padding: 0 }}>
      <li className="col-1-4">
        <AmountBtn
          changeAmount={changeAmount}
          amount={amount}
          amountText={10}
        />
      </li>
      <li className="col-1-4">
        <AmountBtn
          changeAmount={changeAmount}
          amount={amount}
          amountText={30}
        />
      </li>
      <li className="col-1-4">
        <AmountBtn
          changeAmount={changeAmount}
          amount={amount}
          amountText={50}
        />
      </li>
      <li className="col-1-4">
        <AmountBtn
          changeAmount={changeAmount}
          amount={amount}
          amountText={100}
        />
      </li>
      <li className="col-1-4">
        <a
          href="#"
          onClick={e => changeAmount(e, 5)}
        >{texts.other}</a>
      </li>
    </ul>
  );
};

AmountBtns.propTypes = {
  changeAmount: propTypes.func.isRequired.isRequired,
  texts: propTypes.object.isRequired,
  amount: propTypes.number.isRequired,
};

export default AmountBtns;
