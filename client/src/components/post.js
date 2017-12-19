import React from 'react';
import PropTypes from 'prop-types';
import { storeEvent } from '../lib/events';
import cookies from '../lib/cookies';

const cleanEmpty = arrArg =>
  arrArg.filter(item => item.length > 0);

class Post extends React.Component {
  static defaultProps = {
    post: {
      post_title: '',
      type: '',
    },
  };

  handleImageLoaded = () => {
    this.props.onImageLoaded();
  }

  goToPost = (e) => {
    e.preventDefault();
    const { post } = this.props;
    const pid = cookies.dp_pid;
    const event = {
      name: 'READPOST',
      person: { pid },
      metadata: {
        url: post.post_permalink,
      },
    };

    storeEvent('cl_event', event)
    .then(() => {
      window.location = post.post_permalink;
    });
  }

  render() {
    const { post, type, read_more } = this.props;
    const { post_image = '', post_title = '' } = post;
    const imgUrl = Array.isArray(post_image) && post_image.length > 1
      ? cleanEmpty(post_image)
      : post_image;
    let title = post_title || '';
    const short = post.post_short ? post.post_short : '';

    if (window.innerWidth <= '767') {
      title = `${title.substring(0, 70)}...`;
    }

    return (
      <div
        className={type === 'main' ? 'grid-item grid-item--main' : 'grid-item'}
      >
        <div
          className={
            type === 'main'
              ? 'grid-item__content grid-item--main__content'
              : 'grid-item__content'
          }
        >
          <a onClick={this.goToPost} href={post.post_permalink}>
            {
              imgUrl.length > 0
              ? <img data-src={imgUrl} className="lazyload" onLoad={this.handleImageLoaded} />
              : <div />
            }
          </a>

          <div
            className={
              type === 'main'
                ? 'grid-item__content__texts grid-item--main__content__texts'
                : 'grid-item__content__texts'
            }
            style={!imgUrl.length > 0 ? { width: '100%' } : {}}
          >
            <h5><a href={post.post_permalink} onClick={this.goToPost}>{title}</a></h5>
            <p>{`${short.substring(0, 220)}...`}</p>
            <a
              href={post.post_permalink}
              onClick={this.goToPost}
              className="grid-item__content__texts__readmore"
            >
              {read_more}...
            </a>
          </div>
        </div>
      </div>
    );
  }
}

Post.propTypes = {
  onImageLoaded: PropTypes.func.isRequired,
  post: PropTypes.object,
  type: PropTypes.string.isRequired,
  read_more: PropTypes.string.isRequired,
};

export default Post;
