import React, { Component } from 'react';
import PropTypes from 'prop-types';
import Slide from './headerSlide';

class headerSlider extends Component {
  static defaultProps = { slides: [], interval: 5000, anchor: '#' };
  state = { currentSlide: 0, left: '0' };

  componentDidMount() {
    this.interval = setInterval(() => {
      this.nextSlide(false);
    }, this.props.interval);
  }

  getSizes = () => {
    const { slides } = this.props;
    const viewportWidth = `${100 * slides.length}%`;
    const slideWidth = `${100 / slides.length}%`;
    const windowHeight = window.innerHeight;

    const navHeight = document.querySelector('.nav')
      ? document.querySelector('.nav').offsetHeight
      : 0;

    const sliderHeight = windowHeight && navHeight
      ? windowHeight - navHeight
      : 'auto';

    return {
      viewportWidth,
      sliderHeight,
      slideWidth,
    };
  }

  nextSlide = (clear = true) => {
    if (clear) clearInterval(this.interval);
    const total = this.props.slides.length - 1;
    const left = this.state.currentSlide < total
      ? this.state.currentSlide + 1
      : 0;

    this.setState({ left: `-${left * 100}%`, currentSlide: left });
  };

  prevSlide = () => {
    clearInterval(this.interval);
    const left = this.state.currentSlide > 0 ? this.state.currentSlide - 1 : 0;
    this.setState({ left: `-${left * 100}%`, currentSlide: left });
  }

  render() {
    const { viewportWidth, sliderHeight, slideWidth } = this.getSizes();
    const { slides } = this.props;
    const viewportStyle = {
      width: viewportWidth,
      height: sliderHeight,
      left: this.state.left,
    };

    const sliderStyle = { height: sliderHeight };

    return (
      <div className="slider" style={sliderStyle}>
        <div className="slider__viewport" style={viewportStyle}>
          {slides.map((slide, i) => {
            const slideProp = { ...slide, width: slideWidth, height: sliderHeight };
            return <Slide key={i} {...slideProp} />;
          })}
        </div>
        {slides.length > 1 &&
        <div className="slider__btns">
          <button className="slider__btns__prev" onClick={this.prevSlide}>
            <i className="ion-chevron-left" />
          </button>
          <button className="slider__btns__next" onClick={this.nextSlide}>
            <i className="ion-chevron-right" />
          </button>
        </div>
          }
        <style jsx>{`
            .slider {
              height: 100%
            }
            .slider__viewport {
              width: 100%;
              height: 100vh;
              left: 0
            }
          `}</style>
      </div>

    );
  }
}

headerSlider.propTypes = {
  slides: PropTypes.array.isRequired,
  interval: PropTypes.number,
};

export default headerSlider;
