import React from 'react';
import PropTypes from 'prop-types';

class Carousel extends React.Component {
  state = {
    currentSlide: 0,
    left: '0',
    viewportWidth: '100%',
  }

  componentDidMount() {
    this.setViewportWidth();
  }

  setViewportWidth = () => {
    const num = $('.bs-carousel-item').length;
    $('.bs-carousel-item').css({ width: `${100 / num}%`, float: 'left' });
    this.setState({ viewportWidth: `${num * 100}%` });
  }

  nextSlide = () => {
    // if (clear) clearInterval(this.interval);
    const total = $('.bs-carousel-item').length - 1;
    const left = this.state.currentSlide < total
      ? this.state.currentSlide + 1
      : 0;

    this.setState({ left: `-${left * 100}%`, currentSlide: left });
  };

  prevSlide = () => {
    // clearInterval(this.interval);
    const left = this.state.currentSlide > 0 ? this.state.currentSlide - 1 : 0;
    this.setState({ left: `-${left * 100}%`, currentSlide: left });
  };

  render() {
    const viewportStyle = {
      width: this.state.viewportWidth,
      left: this.state.left,
    };

    const btnLeft = { left: '20px' };
    const btnRight = { right: '20px' };

    return (
      <div style={{ width: '100%', overflow: 'hidden' }}>
        <div className="viewport" style={viewportStyle}>
          <div dangerouslySetInnerHTML={{ __html: this.props.content }} />
        </div>
        <div>
          <button onClick={this.prevSlide} style={btnLeft}>
            <i className="ion-chevron-left" />
          </button>
          <button onClick={this.nextSlide} style={btnRight}>
            <i className="ion-chevron-right" />
          </button>
        </div>
        <style jsx>{`
            .viewport {
              position: relative;
              transition: left 300ms;
            }

            button {
              display: block;
              background: rgba(0,0,0, .5);
              font-size: 20px;
              color: #fff;
              text-align: center;
              width: 40px;
              height: 40px;
              border-radius: 40px;
              position: absolute;
              top: 45%;
              display: flex;
              align-items: center;
              justify-content: center;
              padding: 0;
            }
        `}</style>
      </div>
    );
  }
}

Carousel.propTypes = {
  content: PropTypes.string,
};

export default Carousel;
