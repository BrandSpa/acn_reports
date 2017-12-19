import React from "react";
import { shallow } from "enzyme";
import ProjectsAbout from "../../components/projectsAbout";
let projects = [
	{
		title: '',
		content: '',
		imgUrl: '',
		post_category: '',
		number: '1 million',
		number_text: 'a 1 million text'
	},
	{
		title: '',
		content: '',
		imgUrl: '',
		post_category: '',
		number: '2 million',
		number_text: 'a 2 million text'
	}
];

describe('Projects About Component', () => {
	it('should change section', () => {
		const wrapper = shallow(<ProjectsAbout projects={projects} texts={{}} />);
		wrapper.instance().handleSection(2);
		expect(wrapper.state()).toEqual({section: 1});
	})

	it('should change content', () => {
		const wrapper = shallow(<ProjectsAbout projects={projects} texts={{}} />);
		wrapper.instance().handleSection(2);
	
		expect(wrapper.find('.projects-about-num__num').props().style.color).toEqual('#00355f');
		expect(wrapper.find('.projects-about-num__num h2').text()).toEqual('2 million');
		expect(wrapper.find('.projects-about-num__text').text()).toEqual('a 2 million text');
	})

})