import React from 'react';
import PropTypes from 'prop-types';
import SectionVideo from './sectionVideo';


class CampaignsSlider extends React.Component {
  static defaultProps = { slides: [], interval: 0 };
  state = { currentSlide: 0, left: '0' };

  componentDidMount() {
    this.interval = setInterval(() => {
      this.nextSlide(false);
    }, this.props.interval);
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
  };

  render() {
    const { slides } = this.props;
    const viewportWidth = `${100 * slides.length}%`;
    const slideWidth = `${100 / slides.length}%`;
    const viewportStyle = { width: viewportWidth, left: this.state.left };

    return (
      <div className="campaigns-slider">
        <div className="campaigns-slider__viewport" style={viewportStyle}>
          {slides.map((slide, i) => (
            <div
              key={i}
              className="campaigns-slider__slide"
              style={{ width: slideWidth }}
            >
              <SectionVideo
                imgUrl={slide.image}
                url={slide.url}
                imageStyle={{ width: '100%' }}
              />
              <div
                className="campaigns-slider__slide__content"
                style={{ background: slide.bg }}
              >
                <h4>
                  <a href={slide.url ? slide.url : '#'}>{slide.title}</a>
                </h4>
                <p>{slide.content}</p>
              </div>
            </div>
            ))}
        </div>

        <div className="campaigns-slider__btns">
          <button
            className="campaigns-slider__btns__prev"
            onClick={this.prevSlide}
          >
            <i className="ion-chevron-left" />
          </button>
          <button
            className="campaigns-slider__btns__next"
            onClick={this.nextSlide}
          >
            <i className="ion-chevron-right" />
          </button>
        </div>
      </div>
    );
  }
}

CampaignsSlider.propTypes = {
  slides: PropTypes.array.isRequired,
  interval: PropTypes.number,
};

export default CampaignsSlider;
