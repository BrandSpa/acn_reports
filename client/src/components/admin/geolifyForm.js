import React from "react";
import getCountries from "../../lib/getCountries";

class GeolifyForm extends React.Component {
  static defaultProps = {
    countries: [],
    urls: []
  };

  state = {
    countries: [],
    urls: []
  };

  componentDidMount() {
    this.setState({ ...this.state, ...this.props });
  }

  handleChange = (ind, type, e) => {
    let { countries, urls } = this.state;

    if (type == "country") {
      countries[ind] = e.currentTarget.value;
    }

    if (type == "url") {
      urls[ind] = e.currentTarget.value;
    }

    this.setState({ countries, urls });
  };

  handleRemove = (ind, e) => {
    e.preventDefault();
    let countries = this.state.countries.filter((con, i) => i != ind);
    this.setState({ countries });
  };

  handleAdd = e => {
    e.preventDefault();
    let countries = this.state.countries.concat([""]);
    let urls = this.state.urls.concat([""]);
    this.setState({ countries, urls });
  };

  renderInput = (i = 0) => {
    return (
      <p>
        <select
          name="countries[]"
          placeholder="Country"
          onChange={this.handleChange.bind(null, i, "country")}
          value={this.state.countries[i]}
        >
          <option value="">Select country</option>
          {getCountries.map((co, i) => {
            return <option key={i} value={co}>{co}</option>;
          })}
        </select>
        <input
          name="urls[]"
          placeholder="url"
          onChange={this.handleChange.bind(null, i, "url")}
          value={this.state.urls[i]}
        />
        <button className="button" onClick={this.handleRemove.bind(null, i)}>
          remove
        </button>
      </p>
    );
  };

  render() {
    return (
      <div>
        {this.state.countries
          ? this.state.countries.map((country, i) => {
              return this.renderInput(i);
            })
          : ""}
        <button onClick={this.handleAdd} className="button">Add</button>
      </div>
    );
  }
}

export default GeolifyForm;
