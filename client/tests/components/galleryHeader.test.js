import React from "react";
import { shallow } from "enzyme";
import GalleryHeader from "../../components/galleryHeader";

describe('Gallery Header Component', () => {
	it('should change section', () => {
		const wrapper = shallow(<GalleryHeader images={[{image: ''}, {image: ''}, {image: ''}]} />);
		wrapper.instance().changeSection('next');
		wrapper.instance().changeSection('next');
		wrapper.instance().changeSection('prev');
		expect(wrapper.state().section).toEqual(1);
	})

	it('should change section with buttons', () => {
		const wrapper = shallow(<GalleryHeader images={[{image: ''}, {image: ''}, {image: ''}]} />);
		wrapper.find('button').at(1).simulate('click');
		wrapper.find('button').at(1).simulate('click');
		wrapper.find('button').at(0).simulate('click');
		expect(wrapper.state().section).toEqual(1);
	})

	
})