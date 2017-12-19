import React from 'react';
import PropTypes from 'prop-types';
import VideoModal from './videoModal';

class headerSlide extends React.Component {

  handleLink = (e) => {
    e.preventDefault();
    if (this.props.is_video) return this.modal.show();
    return setTimeout(() => window.location.href = this.props.url, 0);
  }

  render() {
    const { image, image_position, width, height, anchor } = this.props;
    const style = {
      backgroundPosition: image_position,
      width,
      height,
    };

    return (
      <div>
        {
          this.props.is_video &&
          <VideoModal ref={modal => this.modal = modal} url={this.props.url} />
        }
        <div className="slider__slide lazyload" style={style} data-bgset={image}>
          <a href="#" className="slider__slide__link-zone" onClick={this.handleLink} />
          <a href={anchor} className="slider__slide__anchor">
            <svg width="50px" height="57px" viewBox="178 602 20 27" version="1.1" xmlns="http://www.w3.org/2000/svg">
              <defs>
                <polyline id="path-1" points="16.9743561 9.37612525 16.9743561 23.0775777 2.91233907 23.0775777" />
                <mask id="mask-2" maskContentUnits="userSpaceOnUse" maskUnits="objectBoundingBox" x="0" y="0" width="14.062017" height="13.7014524" fill="white">
                  <use xlinkHref="#path-1" />
                </mask>
                <polyline id="path-3" points="16.9743561 3.23766371 16.9743561 16.9391162 2.91233907 16.9391162" />
                <mask id="mask-4" maskContentUnits="userSpaceOnUse" maskUnits="objectBoundingBox" x="0" y="0" width="14.062017" height="13.7014524" fill="white">
                  <use xlinkHref="#path-3" />
                </mask>
              </defs>
              <g id="Group-12" stroke="none" strokeWidth="1" fill="none" fillRule="evenodd" transform="translate(178.000000, 602.000000)">
                <use id="Rectangle" stroke="#F1364E" mask="url(#mask-2)" strokeWidth="4" transform="translate(9.943348, 16.226851) rotate(-315.000000) translate(-9.943348, -16.226851) " xlinkHref="#path-1" />
                <use id="Rectangle-Copy" stroke="#F1364E" mask="url(#mask-4)" strokeWidth="4" transform="translate(9.943348, 10.088390) rotate(-315.000000) translate(-9.943348, -10.088390) " xlinkHref="#path-3" />
              </g>
            </svg>
          </a>
        </div>
      </div>
    );
  }
}

headerSlide.propTypes = {
  image: PropTypes.string.isRequired,
  image_position: PropTypes.string.isRequired,
  anchor: PropTypes.string.isRequired,
  url: PropTypes.string.isRequired,
  width: PropTypes.string.isRequired,
  height: PropTypes.string.isRequired,
  is_video: PropTypes.string.isRequired,
};

export default headerSlide;
