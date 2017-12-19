import React from 'react';
import { shallow, mount } from 'enzyme';
import moxios from 'moxios';
import ContactForm from '../../components/contactForm';

describe('component ContactForm', () => {
  beforeEach(() => {
    moxios.install();
  });

  afterEach(() => {
    moxios.uninstall();
  });

  it('should render as expected', () => {
    const wrapper = shallow(<ContactForm />);
    expect(wrapper.getNodes()).toMatchSnapshot();
  });

  it('should have 3 inputs and 1 select', () => {
    const wrapper = shallow(<ContactForm />);
    expect(wrapper.find('input').length).toBe(3);
    expect(wrapper.find('select').length).toBe(1);
  });

  it('should change country on componentDidMount', () => {
    const wrapper = mount(<ContactForm country="Germany" countries={['Argentina', 'Colombia']} />);
    expect(wrapper.props().country).toBe('Germany');
  });

  it('should change contact state', () => {
    const name = 'ale';
    const lastname = 'san';
    const email = 'alesan@gmail.com';
    const e = {};
    const wrapper = shallow(<ContactForm />);
    wrapper
      .find('input')
      .at(0)
      .simulate('change', { e, target: { value: name } });

    wrapper
      .find('input')
      .at(1)
      .simulate('change', { e, target: { value: lastname } });

    wrapper
      .find('input')
      .at(2)
      .simulate('change', { e, target: { value: email } });

    expect(wrapper.state().contact).toEqual({
      name,
      lastname,
      email,
      country: '',
    });
  });

  it('should show validations', () => {
    const wrapper = shallow(<ContactForm />);
    wrapper.find('button').simulate('click', { preventDefault: () => {} });
    expect(wrapper.find('.input-error').length).toBe(3);
  });
});
