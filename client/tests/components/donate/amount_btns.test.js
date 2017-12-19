import React from 'react';
import { shallow } from 'enzyme';
import AmountBtns from '../../../components/donate/amountBtns';

describe('donate amount btns component', () => {
  it('should call function changeAmount five times', () => {
    const changeAmount = jest.fn();
    const wrapper = shallow(<AmountBtns texts={{}} changeAmount={changeAmount} />);
    wrapper.find('a').at(0).simulate('click');
    wrapper.find('a').at(1).simulate('click');
    wrapper.find('a').at(2).simulate('click');
    wrapper.find('a').at(3).simulate('click');
    wrapper.find('a').at(4).simulate('click');
    expect(changeAmount).toHaveBeenCalledTimes(5);
  });
});
