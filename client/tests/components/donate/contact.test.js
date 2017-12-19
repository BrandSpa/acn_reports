import React from 'react';
import { shallow } from 'enzyme';
import Contact from '../../../components/donate/contact';

describe('component contact', () => {
	it('should pass validations', () => {
		let onChange = jest.fn();
		let contact = { name: 'Alejandro', email: 'ale@gmail.com', country: 'Colombia' };
		let wrapper = shallow(<Contact onChange={onChange} contact={ contact } />);
		wrapper.instance().validateAll();

		let expected = { 
			"errors": { 
				"contact": { 
					"country": true, 
					"email": true, 
					"name": true
				}
			}
		};

		expect(onChange).toBeCalledWith(expected);
	})

	it('should doesnt pass validations', () => {
		let onChange = jest.fn();
		let contact = { name: '', email: '', country: '' };
		let wrapper = shallow(<Contact onChange={onChange} contact={ contact } />);
		wrapper.instance().validateAll();
		
		let expected = { 
			"errors": { 
				"contact": { 
					"country": false, 
					"email": false, 
					"name": false
				}
			}
		};

		expect(onChange).toBeCalledWith(expected);
	})
	
})
