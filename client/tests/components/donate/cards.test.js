import React from 'react';
import {shallow} from 'enzyme';
import Cards from '../../../components/donate/cards';

describe('donate amount component', () => {
	it("shouldn't have active card", () => {
		const wrapper = shallow(<Cards texts={{}} stripe={{card_type: ''}} />);
		expect(wrapper.find('.card-type--active').length).toBe(0);
	})

	it('should have one active card with visa', () => {
		const wrapper = shallow(<Cards texts={{}} stripe={{card_type: 'visa'}} />);
		expect(wrapper.find('.card-type--active').length).toBe(1);
	})

	it('should have one active card with mastercard', () => {
		const wrapper = shallow(<Cards texts={{}} stripe={{card_type: 'master-card'}} />);
		expect(wrapper.find('.card-type--active').length).toBe(1);
	})

	it('should have one active card with diners', () => {
		const wrapper = shallow(<Cards texts={{}} stripe={{card_type: 'diners-club'}} />);
		expect(wrapper.find('.card-type--active').length).toBe(1);
	})

	it('should have one active card with american-express', () => {
		const wrapper = shallow(<Cards texts={{}} stripe={{card_type: 'american-express'}} />);
		expect(wrapper.find('.card-type--active').length).toBe(1);
	})

	it('should have one active card with discover', () => {
		const wrapper = shallow(<Cards texts={{}} stripe={{card_type: 'discover'}} />);
		expect(wrapper.find('.card-type--active').length).toBe(1);
	})
	
});