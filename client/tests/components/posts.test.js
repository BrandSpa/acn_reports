import React from "react";
import { shallow, mount } from "enzyme";
import moxios from "moxios";
import Posts from "../../components/posts";
import axios from "axios";
import sinon from "sinon";

describe("Posts component", () => {
	beforeEach(() => {
		moxios.install();
	})

	afterEach(() => {
		moxios.uninstall();
	})

	it("should get posts default array", () => {
		let posts = [];
		let wrapper = shallow(<Posts />);
		wrapper.setState({ posts });
		expect(wrapper.state('posts')).toEqual([]);
	})

	it("should get posts", () => {
		let posts = [{id: 1}, {id: 2}, {id: 3}];
		let wrapper = mount(<Posts />);
		wrapper.setState({posts});
		expect(wrapper.state('posts')).toEqual(posts);
		expect(wrapper.find(".grid-item").length).toBe(3);
	})
})
