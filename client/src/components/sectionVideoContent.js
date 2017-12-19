import React from 'react';
import VideoModal from './videoModal';

class SectionVideoContent extends React.Component {
  static defaultProps = {
    imgUrl: '',
    url: 'https://www.youtube.com/embed/_lQvw2vSDbs',
    content: '',
    fullHeight: false,
  };

  showVideo = (e) => {
    e.preventDefault();
    this.modal.show();
  };

  render() {
    const h = window.innerHeight - 100;

    return (
      <div>
        <VideoModal ref={modal => (this.modal = modal)} url={this.props.url} />
        <div
          className="video-content__bg-container"
          style={{ background: `url(${this.props.imgUrl})`, height: this.props.fullHeight ? h : '900px' }}
        >
          <a
            href="#"
            className="image-video__link"
            onClick={this.showVideo}
          />
          <div dangerouslySetInnerHTML={{ __html: this.props.content }} />
        </div>

        <style jsx>{`
          .video-content__bg-container {
            float: left;
            line-height: 0;
            background-size: cover;
            background-position: center;
            width: 100%;
          }

          .image-video__link {
            left: 0;
            right: 0;
            bottom: 0;
            top: 0;
            width: 100%;
            position: absolute
          }

          @media (max-width: 767px) {
            .video-content__bg-container  {
              height: auto
            }
          }

        `}</style>
      </div>
    );
  }
}

export default SectionVideoContent;
