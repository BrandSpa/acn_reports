import React from 'react';
import {shallow} from 'enzyme';
import Amount from '../../../components/donate/amount';

describe('donate amount component', () => {

	it('should change donation_type to once', () => {
		const onChange = jest.fn();
		const onlyNum = jest.fn();
		const wrapper = shallow(<Amount onlyNum={onlyNum} onChange={onChange} />);
		wrapper.find('a').at(1).simulate('click');
		expect(onChange).toHaveBeenCalledTimes(1);
		expect(onChange.mock.calls[0][0]).toEqual({donation_type: 'once'});
	})

	it('should change donation_type to monthly', () => {
		const onChange = jest.fn();
		const onlyNum = jest.fn();
		const wrapper = shallow(<Amount onlyNum={onlyNum} onChange={onChange} />);
			wrapper.find('a').at(0).simulate('click');
			expect(onChange).toHaveBeenCalledTimes(1);
			expect(onChange.mock.calls[0][0]).toEqual({donation_type: 'monthly'});
	})

	it('should call function onChange when input amount change', () => {
		const onChange = jest.fn();
		const onlyNum = val => val;
		const wrapper = shallow(<Amount onlyNum={onlyNum} onChange={onChange} />);
		wrapper.find('input').at(0).simulate('change', {currentTarget: {value: 65}});
		expect(onChange.mock.calls[0][0]).toEqual({amount: "65"});
	})

	it('should have active monthly btn', () => {
		const wrapper = shallow(<Amount donation_type="monthly" />);
		expect(wrapper.find('.donate_react__type--active').length).toBe(1);
	})

	it('should have active once btn', () => {
		const wrapper = shallow(<Amount donation_type="once" />);
		expect(wrapper.find('.donate_react__type--active').length).toBe(1);
	})
	
});
