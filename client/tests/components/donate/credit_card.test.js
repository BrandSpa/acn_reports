import React from 'react';
import { shallow } from 'enzyme';
import CreditCard from '../../../components/donate/creditCard';

describe('donate amount component', () => {
	it("should return stripe number", () => {
		let onChange = jest.fn();
		let wrapper = shallow(<CreditCard onChange={onChange} />);
		let value = { currentTarget: { 
				value: '4000056655665556ale'
			} 
		};

		wrapper.find('input').at(0)
		.simulate('change', value);

		let expected = {
			stripe: {
				card_type: 'visa',
				number: '4000056655665556'
			}, 
			errors: {
				stripe: { number: true }
			}
		};

		expect(onChange.mock.calls[0][0]).toEqual(expected);
	})
	
	it('should validate all fields and pass', () => {
		let onChange = jest.fn();
		let stripe = {
			number: '4242424242424242',
			exp_month: '02',
			exp_year: '20',
			cvc: '123'
		};

		let wrapper = shallow(
			<CreditCard 
				stripe={stripe} 
				onChange={onChange} 
			/>
		);
		
		wrapper.instance().validateAll();
		
		let expected = { errors: {
			stripe: {
				number: true,
				cvc: true,
				exp_month: true,
				exp_year: true
			}
		}};

		expect(onChange.mock.calls[0][0]).toEqual(expected);
	})

	it('should validate all fields and dont pass', () => {
		let onChange = jest.fn();
		let stripe = {
			number: '42424',
			exp_month: '',
			exp_year: '',
			cvc: ''
		};

		let wrapper = shallow(
			<CreditCard 
				stripe={stripe} 
				onChange={onChange} 
			/>
		);
		
		wrapper.instance().validateAll();
		
		let expected = { errors: {
			stripe: {
				number: false,
				cvc: false,
				exp_month: false,
				exp_year: false
			}
		}};

		expect(onChange.mock.calls[0][0]).toEqual(expected);
	})

	it('should get card type', () => {
		let wrapper = shallow(<CreditCard />);
		let visa = wrapper.instance().getCardType('4012888888881881');
		let master = wrapper.instance().getCardType('5555555555554444');
		let american = wrapper.instance().getCardType('378282246310005');
		let discover = wrapper.instance().getCardType('6011111111111117');
		let diners = wrapper.instance().getCardType('30569309025904');
		let jcb = wrapper.instance().getCardType('3530111333300000');

		expect(visa).toBe('visa');
		expect(master).toBe('master-card');
		expect(american).toBe('american-express');
		expect(discover).toBe('discover');
		expect(diners).toBe('diners-club');
		expect(jcb).toBe('jcb');
	})
});