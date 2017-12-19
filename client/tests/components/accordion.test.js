import React from "react";
import { shallow } from "enzyme";
import Accordion from "../../components/accordion";

describe('accordion component', () => {
	it('should render as expected', () => {
		let wrapper = shallow(<Accordion content={'this is his content'} btnTitle='acn int' />);
		expect(wrapper.getNodes()).toMatchSnapshot();
	})

	it('it should toggle to true', () => {
		let wrapper = shallow(<Accordion />);
		wrapper.find('button').simulate('click');
		expect(wrapper.state().show).toBe(true);
	})

	it('it should have icon up', () => {
			let wrapper = shallow(<Accordion />);
		wrapper.find('button').simulate('click');
		expect(wrapper.find('button i').hasClass('ion-chevron-up')).toBe(true);
	})

	it('it should toggle to false', () => {
		let wrapper = shallow(<Accordion />);
		wrapper.find('button').simulate('click');
		wrapper.find('button').simulate('click');
		expect(wrapper.state().show).toBe(false);
	})

	it('it should have icon down', () => {
			let wrapper = shallow(<Accordion />);
		wrapper.find('button').simulate('click');
		wrapper.find('button').simulate('click');
		expect(wrapper.find('button i').hasClass('ion-chevron-down')).toBe(true);
	})
})
