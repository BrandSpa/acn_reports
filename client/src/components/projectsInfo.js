import React, { Component } from "react";
import debounce from "lodash/debounce";
import ProjectsIcons from "./projectsIcons";

const colors = {
  1: "#b91325",
  2: "#00355f",
  3: "#6e5785",
  4: "#95a0ad",
  5: "#156734",
  6: "#689038",
  7: "#7a2d04",
  8: "#b27009",
  9: "#E4A70F"
};

class ProjectsInfo extends Component {
	constructor(props) {
		super(props);
		this.state = {
			section: 9,
			projects: []
		}
	}

	componentDidMount() {
		let num = this.state.section;

		 window.addEventListener(
      "resize",
      debounce(event => {
        this.moveArrow(this.state.section);
      }, 200)
    );

    setTimeout(() => {
      this.moveArrow(num);
    }, 1000);
	}

	handleSection = (section, e) => {
		this.setState({ section });
		this.moveArrow(section);
	};

	moveArrow = num => {
    let left = this.el.querySelector(`.projects__icons li:nth-child(${num})`)
      .offsetLeft;
    this.el.querySelector(".projects__arrow").style.left = `${left}px`;
  };

	render() {

		let section = this.state.section - 1;

		return (
			<div ref={el => (this.el = el)}>
				<ProjectsIcons onChange={this.handleSection} />
				<div className="project-info__section" style={{background: colors[this.state.section]}}>
					<div className="projects__arrow" />
					<span className="project-info__num">{this.props.projects[section] ? this.props.projects[section].number : ""}</span>
					<span style={{ fontSize: "30px" }}>{this.props.projects[section] ? this.props.projects[section].number_text : ""}</span>
				</div>
        <style jsx>{`

          .project-info__section {
            padding: 40px;
      			text-align: center;
      			color: #fff;
      			display: flex;
      			justify-content: center;
      			align-items: center;
      			position: relative;
          }

          .project-info__num {
            font-size: 4em;
      			margin-right: 60px;
          }

          @media (max-width: 767px) {
            .project-info__section {
              display: 'block'
            }

            .project-info__num {
              margin: 0;
              display: block
            }
          }
        `}</style>
			</div>

		)
	}
}

export default ProjectsInfo;
