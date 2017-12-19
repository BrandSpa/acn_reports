import React, { Component } from 'react';
import PropTypes from 'prop-types';

class Cards extends Component {
  cardType = (type) => {
    const typeCls = this.props.stripe.card_type === type
      ? 'card-type card-type--active'
      : 'card-type';
    return typeCls;
  }

  render() {
    const { texts } = this.props;

    return (
      <div className="form-group donate_landing__cards">
        <img
          className={this.cardType('visa')}
          alt="visa"
          src={`${texts.template_uri}/public/img/cards/Visa.png`}
        />
        <img
          className={this.cardType('master-card')}
          alt="mastercard"
          src={`${texts.template_uri}/public/img/cards/MasterCard.png`}
        />
        <img
          className={this.cardType('diners-club')}
          alt="diners club"
          src={`${texts.template_uri}/public/img/cards/DinersClub.png`}
        />
        <img
          className={this.cardType('american-express')}
          alt="american express"
          src={`${texts.template_uri}/public/img/cards/AmericanExpress.png`}
        />
        <img
          className={this.cardType('discover')}
          alt="discover"
          src={`${texts.template_uri}/public/img/cards/Discover.png`}
        />
      </div>
    );
  }
}

Cards.propTypes = {
  stripe: PropTypes.object.isRequired,
  texts: PropTypes.object.isRequired,
};

export default Cards;
