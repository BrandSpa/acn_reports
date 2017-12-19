import React from "react";
import { shallow } from "enzyme";
import GalleryMetabox from "../../components/admin/galleryMetabox";

describe('Gallery metabox component', () => {
	it('should add inputs', () => {
		const wrapper = shallow(<GalleryMetabox />);
		wrapper.find('button .gallery-metabox__add').simulate('click', {preventDefault: () => {}});
		wrapper.find('button .gallery-metabox__add').simulate('click', {preventDefault: () => {}});

		expect(wrapper.state().images.length).toBe(2);
		expect(wrapper.state().excerpts.length).toBe(2);
		expect(wrapper.find('input').length).toBe(2);
		expect(wrapper.find('textarea').length).toBe(2);
	})

	it('should remove inputs', () => {
		const wrapper = shallow(<GalleryMetabox />);
		wrapper.find('button .gallery-metabox__add').simulate('click', {preventDefault: () => {}});
		wrapper.find('button .gallery-metabox__remove').simulate('click', {preventDefault: () => {}});
		expect(wrapper.state().images.length).toBe(0);
		expect(wrapper.state().excerpts.length).toBe(0);
		expect(wrapper.find('input').length).toBe(0);
		expect(wrapper.find('textarea').length).toBe(0);
	})

	it('should change state', () => {
		const wrapper = shallow(<GalleryMetabox />);
		wrapper.find('button .gallery-metabox__add').simulate('click', {preventDefault: () => {}});
		wrapper.find('input').simulate('change', {currentTarget: {value: 'nea'}});
		wrapper.find('textarea').simulate('change', {currentTarget: {value: 'nea'}});
		expect(wrapper.state().images).toEqual(["nea"]);
		expect(wrapper.state().excerpts).toEqual(["nea"]);
	})

});
