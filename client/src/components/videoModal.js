import React from 'react';

class Modal extends React.Component {
  state = { show: false };

  componentDidMount() {
    document.addEventListener('keydown', this.handleEscKey, false);
  }

  componentWillUnmount() {
    document.removeEventListener('keydown', this.handleEscKey, false);
  }

  handleEscKey = (e) => {
    if (e.keyCode == 27) this.setState({ show: false });
  };

  close = (e) => {
    e.preventDefault();
    this.setState({ show: false });
  };

  show = () => {
    this.setState({ show: true });
  };

  render() {
    const { url } = this.props;

    const iframeStyle = {
      height: window.innerHeight ? window.innerHeight : '100hv',
    };

    return (
      <div className={this.state.show ? 'modal modal--show' : 'modal'}>
        <a className="modal__close" href="#" onClick={this.close}>
          <i className="ion-close" />
        </a>
        <div className="iframe-container" style={iframeStyle}>
          {this.state.show
            ? <iframe
              src={`${url}?autoplay=1`}
              frameBorder="0"
              height="315"
              width="100%"
              allowFullScreen
            />
            : ''}
        </div>
      </div>
    );
  }
}

export default Modal;
