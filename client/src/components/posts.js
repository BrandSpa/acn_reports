import React from 'react';
import Minigrid from 'minigrid';
import debounce from 'lodash/debounce';
import PropTypes from 'prop-types';
import Post from './post';
import fetchwp from '../lib/fetch_wp';

class Posts extends React.Component {
  state = { posts: [], paged: 1, seeMore: true }

  componentWillMount() {
    this.getPosts();
  }

  componentDidMount() {
    window.addEventListener('resize', debounce(this.initGrid, 300));
    this.initGrid();
  }

  componentDidUpdate() {
    this.initGrid();
  }

  getPosts = async () => {
    const posts = await fetchwp('get_posts');
    this.setState({ posts: posts.data });
  }

  initGrid = () => {
    const { posts } = this.state;

    if (posts && posts.length > 0) {
      const container = this.grid;
      const grid = new Minigrid({ container, item: '.grid-item' });
      grid.mount();
    }
  };

  goToPosts = () => {
    window.location = this.props.see_more_link;
  }

  render() {
    const { posts = [] } = this.state;

    const postMain = posts.map((post, i) => {
      if (i === 0) {
        return (
          <Post
            key={post.ID}
            onImageLoaded={this.initGrid}
            {...this.props}
            type="main"
            post={post}
          />
        );
      }
    });

    const postsNodes = posts.map((post, i) => {
      if (i !== 0) {
        return (
          <Post
            key={post.ID}
            onImageLoaded={this.initGrid}
            {...this.props}
            type="item"
            post={post}
          />
        );
      }
    });

    return (
      <div>
        <div ref={grid => (this.grid = grid)}>
          {postMain}
          <div className="grid-items">
            {postsNodes}
          </div>
        </div>
        <button
          style={{ display: 'block' }}
          onClick={this.goToPosts}
          className={this.state.seeMore ? 'bs-see-more' : 'hidden'}
        >
          {this.props.see_more}
        </button>
      </div>
    );
  }
}

Posts.propTypes = {
  see_more: PropTypes.string.isRequired,
  see_more_link: PropTypes.string.isRequired,
};
export default Posts;
