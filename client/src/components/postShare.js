import React, { Component } from "react";
import { eventGoogleAnalytics, eventConvertloopAsync } from "../lib/events";

class PostShare extends Component {

  onRedirect = (e) => {
    e.preventDefault();
    const href = e.currentTarget.getAttribute('href');
    const l = bs.currentPageLang == "Español" ? "SP" : "EN";

    eventGoogleAnalytics({category: 'SHARE', action: 'SHARE', label: `SHARE_${l}`})
    .then(() => {
      const event = {
        name: 'Shares',
        person: {},
        metadata: {
          url: window.location.href
        }
      };

      return eventConvertloopAsync(event);
    })
    .then(() => {
      setTimeout(() => {
        window.location = href;
      }, 0);
    })
  }

  render() {
    const currentUrl = window.location.href;
    const { title, subtitle } = this.props;

    return (
      <div>
      <span className="title">{title}</span>

      <div className="bs-post__share">
      	<div className="l-wrap">
      	 <span className="bs-post__share-subtitle">{subtitle}</span>
      		<ul>
      			<li>
            	<a
                onClick={this.onRedirect}
                className="icon"
                href={`https://www.facebook.com/sharer/sharer.php?u=${currentUrl}`}
              >
              	<i className="ion-social-facebook"></i>
              </a>
            </li>
      			<li>
      				<a
                onClick={this.onRedirect}
                className="icon"
                href={`https://twitter.com/intent/tweet?text=${currentUrl}`}
              >
      					<i className="ion-social-twitter"></i>
              </a>
      			</li>
      			<li>
      				<a
                onClick={this.onRedirect}
                className="icon"
                href={`https://www.linkedin.com/shareArticle?mini=true&url=${currentUrl}`}
              >
      					<i className="ion-social-linkedin"></i>
              </a>
      			</li>
      			<li>
      				<a
                onClick={this.onRedirect}
                className="icon"
                href={`whatsapp://send?text=${currentUrl}`}
              >
      					<i className="ion-social-whatsapp-outline"></i>
      				</a>
      			</li>
      		</ul>
      	</div>
      </div>
      <style jsx>{`
        .bs-post__share {
          background: tran
        }

        .bs-post__share-subtitle {
          display: inline-block;
          font-size: 20px;
          color: #3C515F
        }

        .l-wrap {
          text-align: center
        }

        ul {
          display: block;
          padding:0;
        }

        ul li {
          display: inline-block;
          margin-right: 15px
          padding-bottom: 1em;
        }

        .title {
          text-align: center;
          font-size: 20px;
          color: #3C515F;
          display:block;
          margin: 40px auto
        }
        .icon {
          color: rgb(241, 54, 78);
          width: 40px;
          height: 40px;
          border-radius: 40px;
          text-align: center;
          display: block;
          border: 1px solid rgb(241, 54, 78);
          padding: 5px;
          font-size: 20px;
        }
      `}</style>
      </div>
    )
  }
}

export default PostShare;
