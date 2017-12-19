import React, { Component } from 'react';
import { storeConvertLoop } from '../actions/contact';
import { storeEvent } from '../lib/events';
import spainProvinces from '../lib/provinces_spain';
import SelectArrow from './selectArrow';

class ContactSpain extends Component {
	state = {
		'name': '',
		'lastname': '',
		'email': '',
		'country': this.props.country,
		'postalCode': '',
		'province': '',
		'terms': false,
		'loading': false,
		'termsError': false 
	}

	handleChange = e => 
		this.setState({ [e.target.name]: e.target.value })

	handleTerms = e => 
		this.setState({ terms: !this.state.terms })

	handleSubmit = async (e) => {
		e.preventDefault();
		const { convertloop, redirect } = this.props;
		const contact = this.state;

		if(this.state.terms) {
			this.setState({loading: !this.state.loading, termsError: false});
			try {
				await storeConvertLoop(convertloop.tags, contact);
				const language = window.bs.currentPageLang === 'Español' ? 'SP' : 'EN';
	
				const gaEventData = { category: 'SUBSCRIBE_SPAIN', action: 'SUBSCRIBE_SPAIN', label: `SUBSCRIBE_SPAIN` };
				await storeEvent('ga_event', gaEventData);
	
				const clEventData = { name: convertloop.event, person: contact };
				await storeEvent('cl_event', clEventData);
	
				const fbEventData = { eventName: 'Lead' };
				await storeEvent('fb_event', fbEventData);
	
				setTimeout(() => window.location = redirect, 0);
			} catch(err) {
				console.log(err);
			}
		} else {
			this.setState({termsError: true});
		}
	
	}
	
	render() {
		const { 
			name, 
			lastname, 
			email, 
			country, 
			postalCode, 
			province,
			terms,
			loading,
			termsError
		} = this.state;

		const {
			countries,
			placeholder,
			texts,
			validation
		} = this.props;

		return (
			<form onSubmit={this.handleSubmit}>
				<div className="inputs-wrap">
					<div className="col-12 col-6-m col-4-l">
						<input 
							type="text"
							name="name" 
							placeholder={placeholder.name}
							value={name}
							onChange={this.handleChange}
							required
						/>
					</div>
					<div className="col-12 col-6-m col-4-l">
						<input 
							type="text" 
							name="lastname" 
							placeholder={placeholder.lastname}
							value={lastname}
							onChange={this.handleChange}
						/>
					</div>
					<div className="col-12 col-6-m col-4-l">
						<input 
							type="email" 
							name="email" 
							placeholder={placeholder.email}
							value={email}
							onChange={this.handleChange}
							required
						/>
					</div>

					<div className="col-12 col-6-m col-4-l">
						<div className="select-container">
							<select name="country" onChange={this.handleChange} value={country}>
							<option value="">{placeholder.country}</option>
								{countries.map(country => 
									<option value={country}>{country}</option>
								)}
							</select>
							<SelectArrow />
						</div>
					</div>
					<div className="col-12 col-6-m col-4-l">
						<input 
							type="text" 
							name="postalCode"
							placeholder={'Código postal'}
							onChange={this.handleChange}
							value={postalCode}
						/>
					</div>
					{country === 'Spain' || country === 'España' ?
						<div className="col-12 col-6-m col-4-l">
							<div className="select-container">
								<select name="province" onChange={this.handleChange} value={province}>
									<option value="">{placeholder.province}</option>
									{spainProvinces.map(province => 
										<option value={province.name}>{province.name}</option>
									)}
								</select>
								<SelectArrow />
							</div>
						</div>
					: null}
				</div>
				<div className="checkbox">
            <label htmlFor="terms">
              <input 
								id="terms" 
								type="checkbox" 
								onChange={this.handleTerms} 
								checked={terms} /> {placeholder.terms}
            </label>
          </div>

					<div className="err-container">
						<div className={termsError ? 'err' : 'hidden'}>
							{validation.terms}
						</div>
        	</div>

					<button disabled={loading}>{loading ? texts.loading : texts.btn}</button>
				<style jsx>{`
					.inputs-wrap::before {
						content: " ";
    				display: table;
					}

					input, select {
						height: 40px;
						width: 100%;
						font-size: 14px;
						color: #2B3740;
						background: #fff;
						border: 2px solid #2B3740;
						font-family: 'Open Sans';
						border-radius: 5px;
						margin-bottom: 20px !important;
					}

					button {
						display: flex;
						background: #FC3938;
						text-align: center;
						font-family: 'Open Sans';
						font-weight: 600;
						font-size: 23px;
						width: 100%;
						padding: 5px 0 7px 0;
						margin: 0 auto;
    				box-sizing: content-box;
						align-self: center;
    				justify-content: center;
						color: #fff;
					}

					#terms {
						width: 15px;
						height: 15px;
						top: 15px;
					}

					.checkbox {
						width: 100%;
						display: flex;
						justify-content: center;
						color: #fff;
						font-size: 12px;
						font-weight: 600;
					}

					.select-container {
						position: relative;
					}

					.err-container {
						display: flex;
						justify-content: center;
						margin: 20px 0;
					}

					.err {
						font-size: .9rem;
						background: #F4334A;
						display: inline;
						padding: 3px 15px 3px 15px;
						border-radius: 3px;
						color: #fff;
					}

					@media (min-width: 992px) {
						input, select {
							height: 50px;
							font-size: 16px;
						}
						
						.checkbox {
							font-size: 20px;
						}

						button {
							font-size: 35px;
							width: 380px;
						}
					}

				`}</style>
			</form>
		)
	}
}

export default ContactSpain;
