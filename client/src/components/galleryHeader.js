import React, { Component } from 'react';
import PropTypes from 'prop-types';

class GalleryHeader extends Component {
  static defaultProps = {
    images: [],
    excerpts: [],
    texts: {},
  }

  state = {
    section: 0,
    imageStyle: {
      maxWidth: '100%',
      display: 'block',
      maxHeight: '500px',
      margin: '0 auto',
    },
  }

  componentDidMount() {
    const nav = document.querySelector('.nav');
    nav.style.background = 'rgb(34, 34, 34)';
  }

  getImage = (e) => {
    let imageStyle;
    if (e.target.height > e.target.width) {
      imageStyle = { ...this.state.imageStyle, maxWidth: '45%' };
      this.setState({ imageStyle });
    } else {
      imageStyle = { ...this.state.imageStyle, maxWidth: '100%' };
      this.setState({ imageStyle });
    }
  }

  changeSection = (type, e) => {
    if (e) e.preventDefault();

    let section = this.state.section;
    if (type === 'next') {
      section = this.state.section < this.props.images.length - 1
        ? this.state.section + 1
        : 0;
    }

    if (type === 'prev') section = this.state.section > 0 ? this.state.section - 1 : 0;

    this.setState({ section });
  }


  render() {
    const { images, excerpts } = this.props;
    const h = window.innerHeight - 100;
    const w = window.innerHeight;
    const rootHeight = `${h}px`;
    const viewportHeight = `${h}px`;

    return (
      <div className="root" style={{ height: rootHeight }}>
        <div style={{ height: viewportHeight }}>
          <div style={{ maxWidth: w, margin: '0 auto', padding: '0 20px' }}>
            <h5 className="gallery-header__title">
              {this.props.texts.gallery} <i className="ion-camera" />
            </h5>

            <div className="gallery-header__item" >
              <img
                onLoad={this.getImage}
                src={images[this.state.section]}
                style={this.state.imageStyle}
              />

              <div className="gallery-header__excerpt-container">
                <span className="gallery-header__excerpt">
                  {excerpts[this.state.section]}
                </span>
              </div>

              <div className="gallery-header__share-list-container">
                <ul className="share-list">
                  <li>
                    <a
                      key={1}
                      className="share-btn"
                      href={`https://www.facebook.com/sharer/sharer.php?u=${window.location.href}`}
                    >
                      <i className="ion-social-facebook" />
                    </a>
                  </li>
                  <li>
                    <a
                      key={2}
                      className="share-btn"
                      href={`https://twitter.com/intent/tweet?text=${window.location.href}`}
                    >
                      <i className="ion-social-twitter" />
                    </a>
                  </li>
                  <li>
                    <a
                      key={3}
                      className="share-btn"
                      href={`https://www.linkedin.com/shareArticle?mini=true&url=${window.location.href}`}
                    >
                      <i className="ion-social-linkedin" />
                    </a>
                  </li>
                  <li>
                    <a
                      key={4}
                      className="share-btn"
                      href={`whatsapp://send?text=${window.location.href}`}
                    >
                      <i className="ion-social-whatsapp-outline" />
                    </a>
                  </li>
                </ul>
                <div style={{ float: 'right', marginTop: '7px' }}>
                  <span style={{ color: '#fff', paddingRight: '10px' }}>
                    {this.state.section + 1}
                    {' '}
                    {this.props.texts.of}
                    {' '}
                    {images.length}
                  </span>
                  <button
                    key={'btn-1'}
                    onClick={e => this.changeSection(e, 'prev')}
                    className="nav-btn"
                  >
                    <i className="ion-chevron-left" />
                  </button>
                  <button
                    key={'btn-2'}
                    onClick={e => this.changeSection(e, 'next')}
                    className="nav-btn"
                  >
                    <i className="ion-chevron-right" />
                  </button>
                </div>
              </div>

            </div>
          </div>
          <div className="arrow-down">
            <a href={'#post-content'}>
              <img
                onLoad={this.getImage}
                src={'/wp-content/themes/acn_int/public/images/down.png'}
              />
            </a>
          </div>
        </div>

        <style jsx>{`

            .root {
              background: #222;
              position: relative;
              overflow: hidden;
            }

            .gallery-header__title {
              color: #fff;
              margin-bottom: 20px
            }

            .gallery-header__item {
              position: relative;
            }

            .gallery-header__excerpt-container {
              width: 100%;
              float: left;
            }

            .gallery-header__excerpt {
              color: #fff;
              margin-top: 20px;
              display: block;
              text-shadow: 2px 2px 2px #222
            }

            .gallery-header__share-list-container {
              width: 100%;
              float: left;
              margin-top: 10px
            }

            .arrow-down {
              position: absolute;
              text-align: center;
              bottom: 10px;
              left: 0;
              right: 0;
            }

            .share-list {
              list-style: none;
              padding: 0;
              float: left;
            }

            .share-list li {
              margin-left: 5px;
              display: none
            }

            .nav-btn {
              border: 1px solid #fff;
              background: transparent;
              width: 40px;
              height: 40px;
              border-radius: 0;
              padding: 0;
            }

            .nav-btn:hover {
              background: rgba(255, 255, 255, .2)
            }

            .share-btn {
              color: #fff;
              width: 30px;
              height: 30px;
              border-radius: 30px;
              text-align: center;
              display: block;
              border: 1px solid #fff;
              padding: 5px;
              font-size: 12px;
            }

            @media(max-width: 767px) {
              .root {
                margin: 0 -20px
              }

              .share-btn {
                background: rgba(255, 255, 255, .2)
              }

              .share-list li {
                display: inline-block
              }
            }
           `}</style>

      </div>
    );
  }
}

GalleryHeader.propTypes = {
  images: PropTypes.object,
  texts: PropTypes.object,
};

export default GalleryHeader;
