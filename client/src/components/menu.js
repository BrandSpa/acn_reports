import React, { Component } from "react";

class Menu extends Component {
  state = {
    openlangs: false
  }

  openDropdown = (e) => {
    e.preventDefault();
    this.setState({openlangs: !this.state.openlangs});
  }

  getLangs = () => {
    const { links = [] } = this.props;
    const langsTitle = links.filter(link => link.classes.indexOf("current-lang") !== -1);
    const langs = links.filter(link => link.post_title == "Language switcher" && link.ID !== langsTitle[0].ID);

    return (
      <li>
        <a href={langsTitle[0].url} onClick={this.openDropdown}>{langsTitle[0].title} <i className={this.state.openlangs ? "ion-chevron-up" : "ion-chevron-down"}></i></a>
        <div className={this.state.openlangs ? "dropdown-content dropdown-content--show" : "dropdown-content"}>
          {langs.map(lang => {
            return <a href={lang.url}>{lang.title}</a>
          })}
        </div>
      </li>
    )
  }

  render() {
    const { links = [] } = this.props;
    console.log(links);
    return(
      <ul className="menu">
      {links.map(link => {
        if(link.classes.indexOf("current-lang") !== -1) {
          return this.getLangs();
        } else {
          if(link.classes.indexOf("lang-item") == -1) {
            return <li className={link.classes.join(" ")}><a href={link.url}>{link.title}</a></li>
          }
        }

      })}
      </ul>
    )
  }
}

export default Menu;
