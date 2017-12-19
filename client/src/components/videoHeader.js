import React from 'react';
import VideoModal from './videoModal';

class VideoHeader extends React.Component {
  static defaultProps = {
    videoUrl: '',
    imageUrl: '',
  };

  openModal = (e) => {
    e.preventDefault();
    this.modal.show();
  };

  render() {
    const { videoUrl, imageUrl } = this.props;
    const height = window.innerHeight < 700
      ? `${window.innerHeight / 2 - 100}px`
      : `${window.innerHeight - 100}px`;

    const style = {
      backgroundImage: `url(${imageUrl})`,
      backgroundSize: 'cover',
      backgroundPosition: 'center',
      width: '100%',
      position: 'relative',
      cursor: 'pointer',
      height,
    };

    return (
      <div>
        <VideoModal ref={modal => (this.modal = modal)} url={videoUrl} />
        <div style={style} onClick={this.openModal}>
          <div
            style={{
              background: 'rgba(60,81,90, .5)',
              width: '100%',
              padding: '10px 10px',
            }}
          >
            <div className="l-wrap" style={{ color: '#fff', fontSize: '18px' }}>
              Video <i className="ion-ios-videocam" />
            </div>
          </div>
        </div>
      </div>
    );
  }
}

export default VideoHeader;
