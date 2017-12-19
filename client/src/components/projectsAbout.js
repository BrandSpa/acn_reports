import React from 'react';
import Projects from './projects';
import PostsAbout from './postsAbout';

const colors = {
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

class ProjectsAbout extends React.Component {
  state = {
    section: 8,
  };

  handleSection = (i) => {
    const section = (i - 1);
    this.setState({ section });
  };

  render() {
    const { section } = this.state;

    return (
      <div>
        <Projects
          contents={this.props.projects.map((project) => {
            project.text = project.content;
            return project;
          })}
          donate={this.props.donate}
          changeSection={this.handleSection}
        />

        <div className="projects-about-num">

          <div
            className="projects-about-num__num"
            style={{ color: colors[this.state.section + 1] }}
          >
            <h2>{this.props.projects[section] ? this.props.projects[section].number : ''}</h2>
          </div>

          <div className="projects-about-num__text" >
            {this.props.projects[section] ? this.props.projects[section].number_text : ''}
          </div>

          <div className="projects-about__posts-container">
            <div className="l-wrap">
              <h4 className="projects-about__posts-title">{this.props.texts.stories}</h4>
              <PostsAbout
                category={this.props.projects[section] ? this.props.projects[section].post_category : ''}
              />
            </div>
          </div>
        </div>
        <style jsx>{`
          .projects-about-num__num {
            width: 50%;
      		  text-align: right;
      			padding-top: 40px;
      			float: left;
      			height: 150px;
      			background: #fff;
          }

          .projects-about-num__text {
            text-align: left;
            width: 50%;
            float: left;
            height: 150px;
            padding: 60px;
            font-size: 1.5em;
            color: #A0A0A0;
          }

          .projects-about__posts-title {
            color: #324049;
            text-transform: uppercase;
            margin-bottom: 20px;
            margin-left: 15px;
            font-weight: normal
          }

          .projects-about__posts-container {
            background: #F8F6F8;
            padding: 80px 0;
            float: left;
            width: 100%;
          }

          @media (max-width: 767px) {
            .projects-about-num__text {
              width: 100%;
              height: auto;
              text-align: center;
              padding: 0 0 60px 0
            }

            .projects-about-num__num {
              width: 100%;
      				height: auto;
      				text-align: center
            }

            .projects-about__posts-container  {
              padding: 20px 0 0 0
            }

          }
        `}</style>
      </div>
    );
  }
}

export default ProjectsAbout;
