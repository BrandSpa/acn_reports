import React, { Component } from 'react';
import countriesList from '../../lib/getCountries';

class ContactGG extends Component {
  state = {
    fields: [''],
    countries: [''],
  }

  componentDidMount() {
    if (Array.isArray(this.props.countries)) {
      this.setState({ countries: this.props.countries });
    }

    if (Array.isArray(this.props.fields)) {
      this.setState({ fields: this.props.fields });
    }
  }

  AddCountry = (e) => {
    e.preventDefault();
    const countries = [...this.state.countries, ''];
    this.setState({ countries });
  }

  AddField = (e) => {
    e.preventDefault();
    const fields = [...this.state.fields, ''];
    this.setState({ fields });
  }

  removeCountry = (index, e) => {
    e.preventDefault();
    let countries = this.state.countries.filter((con, i) => i != index);
    this.setState({ countries });
  }

  removeField = (index, e) => {
    e.preventDefault();
    let fields = this.state.fields.filter((con, i) => i != index);
    this.setState({ fields });
  }

  handleCountry = (index, e) => {
    let { countries } = this.state;
    countries[index] = e.target.value;
    this.setState({ countries });
  }

  handleField = (index, e) => {
    let { fields } = this.state;
    fields[index] = e.target.value;
    this.setState({ fields });
  }

  render() {
    const { countries, fields } = this.state;

    return (
      <div>
        {countries.map((country, i)=>
          <p className="form-group" key={i}>
            <select
              name="countries[]"
              value={country}
              className="form-control"
              onChange={this.handleCountry.bind(null, i)}
            >
              <option value="">Select country</option>
              {countriesList.map((countryName, i) =>
                <option key={i} value={countryName}>{countryName}</option>
              )}
            </select>
            <button className="button" onClick={this.removeCountry.bind(null, i)}>Remove</button>
          </p>
        )}
        <p>
          <button className="button" onClick={this.AddCountry}>Add country</button>
        </p>
        {fields.map((field, i) =>
          <p className="form-group" key={i}>
            <input
              name="info[]"
              type="text"
              className="form-control"
              value={field}
              onChange={this.handleField.bind(null, i)}
            />
            <button className="button" onClick={this.removeField.bind(null, i)}>Remove</button>
          </p>
        )}
        <p>
          <button className="button" onClick={this.AddField}>Add field</button>
        </p>

      </div>
    )
  }
}

export default ContactGG;
