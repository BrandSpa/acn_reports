import React, { Component } from 'react';
import PropTypes from 'prop-types';

class ContactsSearchGG extends Component {
  state = {
    query: '',
    results: [],
    country: '',
    openResults: false,
  }

  handleSubmit = (country, e) => {
    e.preventDefault();
  }

  handleChange = (e) => {
    e.preventDefault();
    const query = e.target.value;
    const { countriesTranslated } = this.props;

    const results = Object.values(countriesTranslated).filter(country =>
      country.toLowerCase().indexOf(query.toLowerCase()) !== -1);

    this.setState({ openResults: true, query, results });
  }

  handleSelect = (e, country) => {
    if (e) e.preventDefault();
    this.setState({ country, openResults: false, query: '' });
    this.props.onSelect(country);
  }

  render() {
    const { countriesTranslated, searchPlaceholder } = this.props;
    const { query, results, openResults } = this.state;

    return (
      <div>
        <form onSubmit={this.handleSubmit}>
          <input type="text" placeholder={searchPlaceholder} onChange={this.handleChange} value={query} />
        </form>
        <div className={openResults ? 'results results--open' : 'results'}>
          <ul>
            {results.length > 0
              ?
                results.map(country =>
                  <li key={country}><a href="#" onClick={e => this.handleSelect(e, country)}>{country}</a></li>,
                )
              :
              Object.values(countriesTranslated).map(country =>
                <li key={country}><a href="#" onClick={e => this.handleSelect(e, country)}>{country}</a></li>,
                )
          }
          </ul>
        </div>
        <style jsx>{`
          .results {
            position: relative;
            max-height: 220px;
            background: #fff;
            overflow-y: scroll;
            display: none;
          }

          .results--open {
            display: block;
          }

          .results ul {
            padding: 0;
          }

          .results ul li {
            list-style: none;
          }

          .results ul li a {
            display: block;
            width: 100%;
            height: 40px;
            font-size: 14px;
            text-align: left;
            padding: 10px 20px;
            background: #f7f7f7;
            color: #9b9b9b;
            transition: all .3s ease-in-out;
          }

          .results ul li a:hover {
            background: red;
            color: #fff;
          }

        `}</style>
      </div>
    );
  }
}

ContactsSearchGG.propTypes = {
  onSelect: PropTypes.func.isRequired,
  countriesTranslated: PropTypes.object.isRequired,
  searchPlaceholder: PropTypes.string.isRequired,
};

export default ContactsSearchGG;
