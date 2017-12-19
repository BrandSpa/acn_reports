import React, { Component } from 'react';
import { storeConvertLoop } from '../actions/contact';
import { storeEvent, eventTagManager } from '../lib/events';


var isoCountries = {
  'AF' : 'Afghanistan',
  'AX' : 'Aland Islands',
  'AL' : 'Albania',
  'DZ' : 'Algeria',
  'AS' : 'American Samoa',
  'AD' : 'Andorra',
  'AO' : 'Angola',
  'AI' : 'Anguilla',
  'AQ' : 'Antarctica',
  'AG' : 'Antigua And Barbuda',
  'AR' : 'Argentina',
  'AM' : 'Armenia',
  'AW' : 'Aruba',
  'AU' : 'Australia',
  'AT' : 'Austria',
  'AZ' : 'Azerbaijan',
  'BS' : 'Bahamas',
  'BH' : 'Bahrain',
  'BD' : 'Bangladesh',
  'BB' : 'Barbados',
  'BY' : 'Belarus',
  'BE' : 'Belgium',
  'BZ' : 'Belize',
  'BJ' : 'Benin',
  'BM' : 'Bermuda',
  'BT' : 'Bhutan',
  'BO' : 'Bolivia',
  'BA' : 'Bosnia And Herzegovina',
  'BW' : 'Botswana',
  'BV' : 'Bouvet Island',
  'BR' : 'Brazil',
  'IO' : 'British Indian Ocean Territory',
  'BN' : 'Brunei Darussalam',
  'BG' : 'Bulgaria',
  'BF' : 'Burkina Faso',
  'BI' : 'Burundi',
  'KH' : 'Cambodia',
  'CM' : 'Cameroon',
  'CA' : 'Canada',
  'CV' : 'Cape Verde',
  'KY' : 'Cayman Islands',
  'CF' : 'Central African Republic',
  'TD' : 'Chad',
  'CL' : 'Chile',
  'CN' : 'China',
  'CX' : 'Christmas Island',
  'CC' : 'Cocos (Keeling) Islands',
  'CO' : 'Colombia',
  'KM' : 'Comoros',
  'CG' : 'Congo',
  'CD' : 'Congo, Democratic Republic',
  'CK' : 'Cook Islands',
  'CR' : 'Costa Rica',
  'CI' : 'Cote D\'Ivoire',
  'HR' : 'Croatia',
  'CU' : 'Cuba',
  'CY' : 'Cyprus',
  'CZ' : 'Czech Republic',
  'DK' : 'Denmark',
  'DJ' : 'Djibouti',
  'DM' : 'Dominica',
  'DO' : 'Dominican Republic',
  'EC' : 'Ecuador',
  'EG' : 'Egypt',
  'SV' : 'El Salvador',
  'GQ' : 'Equatorial Guinea',
  'ER' : 'Eritrea',
  'EE' : 'Estonia',
  'ET' : 'Ethiopia',
  'FK' : 'Falkland Islands (Malvinas)',
  'FO' : 'Faroe Islands',
  'FJ' : 'Fiji',
  'FI' : 'Finland',
  'FR' : 'France',
  'GF' : 'French Guiana',
  'PF' : 'French Polynesia',
  'TF' : 'French Southern Territories',
  'GA' : 'Gabon',
  'GM' : 'Gambia',
  'GE' : 'Georgia',
  'DE' : 'Germany',
  'GH' : 'Ghana',
  'GI' : 'Gibraltar',
  'GR' : 'Greece',
  'GL' : 'Greenland',
  'GD' : 'Grenada',
  'GP' : 'Guadeloupe',
  'GU' : 'Guam',
  'GT' : 'Guatemala',
  'GG' : 'Guernsey',
  'GN' : 'Guinea',
  'GW' : 'Guinea-Bissau',
  'GY' : 'Guyana',
  'HT' : 'Haiti',
  'HM' : 'Heard Island & Mcdonald Islands',
  'VA' : 'Holy See (Vatican City State)',
  'HN' : 'Honduras',
  'HK' : 'Hong Kong',
  'HU' : 'Hungary',
  'IS' : 'Iceland',
  'IN' : 'India',
  'ID' : 'Indonesia',
  'IR' : 'Iran, Islamic Republic Of',
  'IQ' : 'Iraq',
  'IE' : 'Ireland',
  'IM' : 'Isle Of Man',
  'IL' : 'Israel',
  'IT' : 'Italy',
  'JM' : 'Jamaica',
  'JP' : 'Japan',
  'JE' : 'Jersey',
  'JO' : 'Jordan',
  'KZ' : 'Kazakhstan',
  'KE' : 'Kenya',
  'KI' : 'Kiribati',
  'KR' : 'Korea',
  'KW' : 'Kuwait',
  'KG' : 'Kyrgyzstan',
  'LA' : 'Lao People\'s Democratic Republic',
  'LV' : 'Latvia',
  'LB' : 'Lebanon',
  'LS' : 'Lesotho',
  'LR' : 'Liberia',
  'LY' : 'Libyan Arab Jamahiriya',
  'LI' : 'Liechtenstein',
  'LT' : 'Lithuania',
  'LU' : 'Luxembourg',
  'MO' : 'Macao',
  'MK' : 'Macedonia',
  'MG' : 'Madagascar',
  'MW' : 'Malawi',
  'MY' : 'Malaysia',
  'MV' : 'Maldives',
  'ML' : 'Mali',
  'MT' : 'Malta',
  'MH' : 'Marshall Islands',
  'MQ' : 'Martinique',
  'MR' : 'Mauritania',
  'MU' : 'Mauritius',
  'YT' : 'Mayotte',
  'MX' : 'Mexico',
  'FM' : 'Micronesia, Federated States Of',
  'MD' : 'Moldova',
  'MC' : 'Monaco',
  'MN' : 'Mongolia',
  'ME' : 'Montenegro',
  'MS' : 'Montserrat',
  'MA' : 'Morocco',
  'MZ' : 'Mozambique',
  'MM' : 'Myanmar',
  'NA' : 'Namibia',
  'NR' : 'Nauru',
  'NP' : 'Nepal',
  'NL' : 'Netherlands',
  'AN' : 'Netherlands Antilles',
  'NC' : 'New Caledonia',
  'NZ' : 'New Zealand',
  'NI' : 'Nicaragua',
  'NE' : 'Niger',
  'NG' : 'Nigeria',
  'NU' : 'Niue',
  'NF' : 'Norfolk Island',
  'MP' : 'Northern Mariana Islands',
  'NO' : 'Norway',
  'OM' : 'Oman',
  'PK' : 'Pakistan',
  'PW' : 'Palau',
  'PS' : 'Palestinian Territory, Occupied',
  'PA' : 'Panama',
  'PG' : 'Papua New Guinea',
  'PY' : 'Paraguay',
  'PE' : 'Peru',
  'PH' : 'Philippines',
  'PN' : 'Pitcairn',
  'PL' : 'Poland',
  'PT' : 'Portugal',
  'PR' : 'Puerto Rico',
  'QA' : 'Qatar',
  'RE' : 'Reunion',
  'RO' : 'Romania',
  'RU' : 'Russian Federation',
  'RW' : 'Rwanda',
  'BL' : 'Saint Barthelemy',
  'SH' : 'Saint Helena',
  'KN' : 'Saint Kitts And Nevis',
  'LC' : 'Saint Lucia',
  'MF' : 'Saint Martin',
  'PM' : 'Saint Pierre And Miquelon',
  'VC' : 'Saint Vincent And Grenadines',
  'WS' : 'Samoa',
  'SM' : 'San Marino',
  'ST' : 'Sao Tome And Principe',
  'SA' : 'Saudi Arabia',
  'SN' : 'Senegal',
  'RS' : 'Serbia',
  'SC' : 'Seychelles',
  'SL' : 'Sierra Leone',
  'SG' : 'Singapore',
  'SK' : 'Slovakia',
  'SI' : 'Slovenia',
  'SB' : 'Solomon Islands',
  'SO' : 'Somalia',
  'ZA' : 'South Africa',
  'GS' : 'South Georgia And Sandwich Isl.',
  'ES' : 'Spain',
  'LK' : 'Sri Lanka',
  'SD' : 'Sudan',
  'SR' : 'Suriname',
  'SJ' : 'Svalbard And Jan Mayen',
  'SZ' : 'Swaziland',
  'SE' : 'Sweden',
  'CH' : 'Switzerland',
  'SY' : 'Syrian Arab Republic',
  'TW' : 'Taiwan',
  'TJ' : 'Tajikistan',
  'TZ' : 'Tanzania',
  'TH' : 'Thailand',
  'TL' : 'Timor-Leste',
  'TG' : 'Togo',
  'TK' : 'Tokelau',
  'TO' : 'Tonga',
  'TT' : 'Trinidad And Tobago',
  'TN' : 'Tunisia',
  'TR' : 'Turkey',
  'TM' : 'Turkmenistan',
  'TC' : 'Turks And Caicos Islands',
  'TV' : 'Tuvalu',
  'UG' : 'Uganda',
  'UA' : 'Ukraine',
  'AE' : 'United Arab Emirates',
  'GB' : 'United Kingdom',
  'US' : 'United States',
  'UM' : 'United States Outlying Islands',
  'UY' : 'Uruguay',
  'UZ' : 'Uzbekistan',
  'VU' : 'Vanuatu',
  'VE' : 'Venezuela',
  'VN' : 'Viet Nam',
  'VG' : 'Virgin Islands, British',
  'VI' : 'Virgin Islands, U.S.',
  'WF' : 'Wallis And Futuna',
  'EH' : 'Western Sahara',
  'YE' : 'Yemen',
  'ZM' : 'Zambia',
  'ZW' : 'Zimbabwe'
};
const validate = (str) => {
  const s = typeof str === 'string' ? str.trim() : '';
  return s.length === 0;
};

class ContactCall extends Component {
  state = {
    name: '',
    lastname: '',
    email: '',
    country: this.props.country,
    city: '',
    phone: '',
    isoCode: '',
    prefix: this.props.prefixes[this.props.country],
    loading: false,
    subscribe: true,
    errors: {
      name: false,
      lastname: false,
      email: false,
      country: false,
      city: false,
      phone: false,
      phoneLenght: false,
    },
  }

  handleInputChange = (e, field) => {
    this.setState({ [e.target.name]: e.target.value });
  }

  handleCountryChange = (e) => {
    this.setState({
      country: e.target.value,
      prefix: this.props.prefixes[e.target.value]
    }); 
    this.changeIso(e.target.value);
  }

  handleOnlyNumbers = (e) => {
    const re = /^[0-9\b]+$/;
    if (e.target.value == '' || re.test(e.target.value)) {
       this.setState({[e.target.name]: e.target.value});
    }
  }

  handlePrefixChange = (e) => {
    this.handleInputChange(e);
    var country = this.getIsoByName(this.props.prefixes, parseInt(e.target.value));
    this.changeIso(country);
  } 

  isValid = () => {
    const errors = Object.keys(this.state.errors).reduce((obj, field) => {
      if(field !== 'phoneLenght'){
        const v = validate(this.state[field]);
        obj[field] = v;
      }else{
        obj[field] = this.state.phone.length < 6;
      }
      return obj;
    }, {});

    this.setState({ errors });

    const invalid = Object.keys(errors).some(err => errors[err]);
    return !invalid;
  }

  sortProperties = (obj) => {
    var sortable=[];
    for(var key in obj)
      if(obj.hasOwnProperty(key))
        sortable.push([key, obj[key]]); 
    
    sortable.sort(function(a, b)
    {
      return a[1]-b[1]; 
    });
    return sortable;
  }

  getIsoByName = (object, value) => {
    var iso = Object.keys(object).find(key => object[key] === value);
    return iso ? iso : ''; 
  }

  handleChangeCheckbox = (e) => {
    this.setState({subscribe: !this.state.subscribe});
  }

  handleStore = async (e) => {
    e.preventDefault();
    const { convertloop, redirect } = this.props;
    this.setState({ loading: true });
    const contact = {
      name: `${this.state.name} ${this.state.lastname}`,
      email: this.state.email,
      phone: `${this.state.prefix}${this.state.phone}`,
      country: this.state.country,
      city: this.state.city,
      subscribe: this.state.subscribe ? 'Yes' : 'No'
    };

    const isValid = this.isValid();

    if (isValid) {
      try {
        await storeConvertLoop(convertloop.tags, contact);
        const language = window.bs.currentPageLang === 'Español' ? 'SP' : 'EN';

        const gaEventData = { category: 'SUBSCRIBE', action: 'SUBSCRIBE_INFO', label: `SUBSCRIBE_${language}` };
        await storeEvent('ga_event', gaEventData);

        const clEventData = { name: convertloop.event, person: contact, metadata: { URL: window.location.href } };
        await storeEvent('cl_event', clEventData);

        const fbEventData = { eventName: 'Lead' };
        await storeEvent('fb_event', fbEventData);

        await eventTagManager();

        setTimeout(() => window.location = redirect, 0);
      } catch (err) {
        console.log(err);
      }
    } else {
      this.setState({ loading: false });
    }
  }
  componentDidMount = () => {
    this.changeIso(this.state.country);
  }
  changeIso = ( country ) => {
    this.setState({isoCode: this.getIsoByName(isoCountries, country)});
  }
  render() {
    const { placeholders, texts, countries, prefixes } = this.props;
    const {
			name,
			lastname,
			email,
      country,
			city,
      phone,
      isoCode,
			loading,
      prefix,
      subscribe,
			errors,
    } = this.state;

    const prefixesArr = this.sortProperties(prefixes);
    return (
      <section ref={ref => this.container = ref}>
        <form onSubmit={this.handleStore}>
          <div className={errors.name ? 'input-section input-err ' : 'input-section'}>
            <div className="input-section__placeholder">
              <i className="ion-person" /> <span></span>
            </div>
            <input
              name="name"
              type="text"
              placeholder={placeholders.name}
              className="input-section__text"
              onChange={e => this.handleInputChange(e)}
              value={name}
            />
          </div>
          <div className={errors.lastname ? 'input-section input-err ' : 'input-section'}>
            <div className="input-section__placeholder">
              <i className="ion-person" /> <span></span>
            </div>
            <input
              name="lastname"
              type="text"
              placeholder={placeholders.lastname}
              className="input-section__text"
              onChange={e => this.handleInputChange(e)}
              value={lastname}
            />
          </div>
          <div className={errors.email ? 'input-section input-err ' : 'input-section'}>
            <div className="input-section__placeholder">
              <i className="ion-ios-email" /> <span></span>
            </div>
            <input
              name="email"
              type="email"
              placeholder={placeholders.email}
              className="input-section__text"
              onChange={e => this.handleInputChange(e)}
              value={email}
            />
          </div>
          <div className={errors.country ? 'input-section input-err ' : 'input-section'}>
            <div className="input-section__placeholder">
              <i className="ion-location" /> <span></span>
            </div>
            <select
              name="country"
              value={country}
              placeholder={placeholders.country}
              onChange={e => this.handleCountryChange(e)}
              className="input-section__select">
              { countries
                .map((countr, i) => (
                <option key={i} value={countr}>{countr}</option>
							))}
            </select>
          </div>
          <div className={errors.city ? 'input-section input-err ' : 'input-section'}>
            <div className="input-section__placeholder">
              <i className="ion-location" /> <span></span>
            </div>
            <input
              name="city"
              type="text"
              placeholder={placeholders.city}
              className="input-section__text"
              onChange={e => this.handleInputChange(e)}
              value={city}
            />
          </div>
          <div className={errors.phone || errors.phoneLenght ? 'input-section input-err ' : 'input-section'}>
            <div className="input-section__placeholder">
              <i className="ion-iphone" /> <span></span>
            </div>
            <div className="iso-code">
              {`${isoCode} `}
            </div>
            <select className="prefix" name="prefix" value={prefix} onChange={e => this.handlePrefixChange(e)}>
              {   prefixesArr
                  .map( contr => 
                <option value={contr[1]}>{`+ ${contr[1]}`}</option>
              )}
            </select>
            <input
              name="phone"
              type="text"
              placeholder={placeholders.phone}
              className="input-section__text"
              pattern="[0-9]*" 
              onChange={this.handleOnlyNumbers}
              value={this.state.phone}
            />
          </div>
          <div className="input-section no-border">
            <label className="col-sm-12">
            <div className="col-sm-1">
            <input 
              type="checkbox" 
              name="subscribe"
              defaultChecked={this.state.subscribe}
              onChange={e => this.handleChangeCheckbox(e)} 
            />
            </div>
            <div className="col-sm-11">
            <span className="inline">Deseo recibir información</span>
            </div>
            </label>
          </div>
          <button className="telephone-btn" disabled={loading}> <span className="ion-ios-telephone telephone-icon"></span> {loading ? texts.loading : texts.btn}</button>
        </form>
        <style jsx>{`
							
					form button {
						height: 50px;
						width: 100%;
						background-color: #7ed321;
						font-size: 20px;
						font-weight: bold;
						text-align: center;
						color: #ffffff;
					}

					.input-section {
						display: flex;
						border: solid 1px #d0d0d0;
						height: 50px;
						width: 100%;
						justify-content: center;
						font-size: 16px;
						color: #1b1b1b;
						margin-bottom: 15px;
					}

          input[type="checkbox"] {
            width: auto;
            height:auto;  
          }
          .inline{
            color: rgba(0,0,0,.6);
            padding-left: 5%;
          }
          input[type="checkbox"], .inline{
            display: inline-block
          }

          .text-center{
            text-align: center;
          }

          .input-section__placeholder i{
            color: #e74348;
          }

					.input-err {
						border-color: red
					}

          .telephone-btn{
            position: relative;
          }

          .telephone-icon{
            font-size: 28px;
            position: absolute;
            left: 16%;
            top: 8px;
          }

					.prefix, .iso-code{
						width: 20%;
						border: none;
						background: #f1f1f1;
						height: 100%;
            overflow: initial;
          }
          .iso-code{
            width: 10%;
            margin-left: 10px;
            text-align: center;
            line-height: 48px;
            padding: 0px 0px 0 10px;
          }

					.input-section__placeholder {
						display: flex;
						flex-direction: row;
						align-items: center;
						font-weight: bold;
					}

					.input-section__placeholder i {
						padding: 0 5px 0 15px;
						font-size: 18px;
					}

					.input-section__text, .input-section__select {
						border: none;
						height: auto;
					}
          .no-border{
            border: none;
            height: 22px;
            justify-content: left;
          }
					input:invalid {

          }
          
          .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
            float: left;
          }
          .col-sm-12 {
            width: 100%;
          }
          .col-sm-11 {
            width: 91.66666667%;
          }
          .col-sm-10 {
            width: 83.33333333%;
          }
          .col-sm-9 {
            width: 75%;
          }
          .col-sm-8 {
            width: 66.66666667%;
          }
          .col-sm-7 {
            width: 58.33333333%;
          }
          .col-sm-6 {
            width: 50%;
          }
          .col-sm-5 {
            width: 41.66666667%;
          }
          .col-sm-4 {
            width: 33.33333333%;
          }
          .col-sm-3 {
            width: 25%;
          }
          .col-sm-2 {
            width: 16.66666667%;
          }
          .col-sm-1 {
            width: 8.33333333%;
          }
          .col-sm-pull-12 {
            right: 100%;
          }
          .col-sm-pull-11 {
            right: 91.66666667%;
          }
          .col-sm-pull-10 {
            right: 83.33333333%;
          }
          .col-sm-pull-9 {
            right: 75%;
          }
          .col-sm-pull-8 {
            right: 66.66666667%;
          }
          .col-sm-pull-7 {
            right: 58.33333333%;
          }
          .col-sm-pull-6 {
            right: 50%;
          }
          .col-sm-pull-5 {
            right: 41.66666667%;
          }
          .col-sm-pull-4 {
            right: 33.33333333%;
          }
          .col-sm-pull-3 {
            right: 25%;
          }
          .col-sm-pull-2 {
            right: 16.66666667%;
          }
          .col-sm-pull-1 {
            right: 8.33333333%;
          }
          .col-sm-pull-0 {
            right: auto;
          }
          .col-sm-push-12 {
            left: 100%;
          }
          .col-sm-push-11 {
            left: 91.66666667%;
          }
          .col-sm-push-10 {
            left: 83.33333333%;
          }
          .col-sm-push-9 {
            left: 75%;
          }
          .col-sm-push-8 {
            left: 66.66666667%;
          }
          .col-sm-push-7 {
            left: 58.33333333%;
          }
          .col-sm-push-6 {
            left: 50%;
          }
          .col-sm-push-5 {
            left: 41.66666667%;
          }
          .col-sm-push-4 {
            left: 33.33333333%;
          }
          .col-sm-push-3 {
            left: 25%;
          }
          .col-sm-push-2 {
            left: 16.66666667%;
          }
          .col-sm-push-1 {
            left: 8.33333333%;
          }
          .col-sm-push-0 {
            left: auto;
          }
          .col-sm-offset-12 {
            margin-left: 100%;
          }
          .col-sm-offset-11 {
            margin-left: 91.66666667%;
          }
          .col-sm-offset-10 {
            margin-left: 83.33333333%;
          }
          .col-sm-offset-9 {
            margin-left: 75%;
          }
          .col-sm-offset-8 {
            margin-left: 66.66666667%;
          }
          .col-sm-offset-7 {
            margin-left: 58.33333333%;
          }
          .col-sm-offset-6 {
            margin-left: 50%;
          }
          .col-sm-offset-5 {
            margin-left: 41.66666667%;
          }
          .col-sm-offset-4 {
            margin-left: 33.33333333%;
          }
          .col-sm-offset-3 {
            margin-left: 25%;
          }
          .col-sm-offset-2 {
            margin-left: 16.66666667%;
          }
          .col-sm-offset-1 {
            margin-left: 8.33333333%;
          }
          .col-sm-offset-0 {
            margin-left: 0%;
          }
				`}</style>
      </section>
    );
  }
}

export default ContactCall;
