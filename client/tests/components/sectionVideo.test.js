import React from "react";
import { mount } from "enzyme";
import SectionVideo from "../../components/sectionVideo";

describe('Section Video Component', () => {
	it('should show video', () => {
		const wrapper = mount(<SectionVideo />);
		wrapper.find('.image-video__link').simulate('click', {preventDefault: () => {}});
		expect(wrapper.find('.modal--show').length).toBe(1);
	})
})
