import React from "react";
import { shallow, mount } from "enzyme";
import Projects from "../../components/projects";
import ProjectsIcons from "../../components/projectsIcons";

describe('component projects', () => {

	it('should render as expected', () => {
		let wrapper = shallow(<ProjectsIcons />);
		expect(wrapper.getNodes()).toMatchSnapshot();
	})


	it('should change num', () => {
		let mock = jest.fn();
		let wrapper = shallow(<ProjectsIcons onChange={mock} />);
		wrapper.find('a').at(0).simulate('click', {preventDefault: () => {}});
		expect(mock).toHaveBeenCalledWith(1);
	})

	it('should change background', () => {
		// document.body.innerHTML = `<ul class="projects__icons"><li></li></ul> <div class="projects__arrow"></div>`;
		let wrapper = mount(<Projects contents={[]} />);
		
		wrapper.instance().changeContent(2);
		expect(wrapper.state().bg).toBe('#00355f');
	})

})
