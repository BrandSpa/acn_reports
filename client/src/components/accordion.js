import React, { Component } from 'react';
import PropTypes from 'prop-types';
import DOMPurify from 'dompurify';

class Accordion extends Component {
  static defaultProps = {
    background: '#687f87',
    titleColor: '',
    content: '',
    btnTitle: '',
  }

  state = { show: false };

  componentDidMount() {
    return { content: '', btnTitle: 'Toggle' };
  }

  toggle = () => {
    this.setState({ show: !this.state.show });
  };

  render() {
    const { content, btnTitle, background, titleColor } = this.props;
    const cleanContent = DOMPurify.sanitize(content);
    const btnStyle = {
      color: titleColor,
      background,
    };

    return (
      <div className="accordion">
        <button
          className="accordion__btn"
          style={btnStyle}
          onClick={this.toggle}
        >
          {btnTitle}
          {' '}
          <i
            className={this.state.show ? 'ion-chevron-up' : 'ion-chevron-down'}
          />
        </button>
        <div
          className="accordion__content"
          style={this.state.show ? { display: 'block' } : { display: 'none' }}
        >
          <div dangerouslySetInnerHTML={{ __html: cleanContent }} />
        </div>
        <style jsx>{`
        .accordion__btn {
          width: 100%;
          height: 60px;
          border: none;
          border-radius: 0;
          font-size: 18px;
          font-weight: normal;
        }

        .accordion__content {
          background: rgba(180, 191, 194, 0.9);
        }

        .accordion__content p {
          margin: 0;
        }
        `}</style>
      </div>
    );
  }
}

Accordion.propTypes = {
  content: PropTypes.string,
  btnTitle: PropTypes.string,
  background: PropTypes.string,
  titleColor: PropTypes.string,
};

export default Accordion;
