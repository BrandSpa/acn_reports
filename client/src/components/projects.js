import React from 'react';
import debounce from 'lodash/debounce';
import PropTypes from 'prop-types';
import ProjectsIcons from './projectsIcons';

const backgroundColors = {
  1: '#b91325',
  2: '#00355f',
  3: '#6e5785',
  4: '#95a0ad',
  5: '#156734',
  6: '#689038',
  7: '#7a2d04',
  8: '#b27009',
  9: '#E4A70F',
};

class Projects extends React.Component {

  state = {
    section: 9,
    bg: '#B91325',
    donateColor: '#B91325',
  }

  componentDidMount() {

  }

  setArrowAndContent = () => {
    let num = 9;

    this.props.contents.map((content, ind) => {
      if (content.hash_url === window.location.hash.replace('#', '')) {
        num = ind + 1;
      }
    });

    window.addEventListener(
          'resize',
          debounce(() => {
            this.moveArrow(this.state.section);
          }, 200),
        );

    setTimeout(() => {
      this.moveArrow(num);
      this.changeContent(num);
    }, 1000);
  }

  moveArrow = (num) => {
    const left = this.el.querySelector(`.projects__icons li:nth-child(${num})`).offsetLeft;
    this.el.querySelector('.projects__arrow').style.left = `${left}px`;
  };

  updateUrl = (hash) => {
    history.pushState(null, null, `#${hash}`);
  };

  changeContent = (num) => {
    const color = backgroundColors[num];
    const ind = num - 1;
    this.setState({ bg: color, donateColor: color, section: num });
    this.moveArrow(num);

    if (this.props.contents.length > 0 && this.props.contents[ind].hash_url) {
      this.updateUrl(this.props.contents[ind].hash_url);
    }

    if (typeof this.props.changeSection === 'function') {
      this.props.changeSection(num);
    }
  };

  render() {
    const { contents = [] } = this.props;
    const content = contents[this.state.section - 1] || {};
    const { title, text, imgUrl } = content;

    return (
      <div className="projects" ref={el => this.el = el}>
        <ProjectsIcons onChange={this.changeContent} />

        <div className="projects__content">
          <div className="projects__arrow" />
          <div
            className="col-4-l projects__content__left"
            style={{ background: this.state.bg }}
          >
            <h4>{title}</h4>
            <div
              className="projects__content__left__text"
              dangerouslySetInnerHTML={{ __html: text }}
            />
            <button className="bs-donate" style={{ color: this.state.donateColor }}>
              {this.props.donate}
            </button>
          </div>
          <div
            className="col-8-l projects__content__right"
            style={{ backgroundImage: `url(${imgUrl})` }}
          />
        </div>
        <style jsx>{`
          .projects__content__left {
            min-height: 500px;
            padding: 40px;
          }

          .projects__content__left h4 {
            color: #fff;
            margin-bottom: 20px;
          }

          .projects__content__left__text {
            color: #fff;
            margin-bottom: 20px;
          }

          .projects__content__right {
            background-size: cover;
            background-position: center;
            min-height: 500px
          }

          @media (max-width: 767px) {
            .projects__content__right {
              min-height: 200px;
            }
          }

          .bs-donate {
            background: #fff;
            border-color: #fff;
            text-transform: uppercase
          }
        `}</style>
      </div>
    );
  }
}

Projects.propTypes = {
  contents: PropTypes.array,
  changeSection: PropTypes.func,
  donate: PropTypes.string,
};

export default Projects;
