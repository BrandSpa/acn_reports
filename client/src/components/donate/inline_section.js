import React, { Component } from 'react';
import DonateInline from './inline';

class DonateInlineSection extends Component {
  static defaultProps = {
    content: '',
  };

  state = {
    section: 0,
  };

  changeSection = (section) => {
    this.setState({ section });
    console.log('hi section', section);
  };

  render() {
    const { texts } = this.props;

    return (
      <div className={{ display: 'flex', flexWrap: 'wrap' }}>
        <div className="col-12-l" style={{ margin: '40px 0' }}>
          <h2
            style={{
              color: '#fff',
              textAlign: 'center',
              textShadow: '0 2px 20px rgba(0,0,0,0.47)',
            }}
          >
            {this.state.section == 0 ? texts.title : texts.success_title}
          </h2>
          <h3
            style={{
              color: '#fff',
              textAlign: 'center',
              textShadow: '0 2px 20px rgba(0,0,0,0.47)',
              fontWeight: '300',
            }}
          >
            {this.state.section == 0 ? texts.subtitle : texts.success_subtitle}
          </h3>
        </div>

        <div
          className="col-12 col-4-l"
          style={this.state.section == 0 ? { display: 'block', background: 'RGBA(43, 58, 68, .9)', padding: '20px' } : { display: 'none' }}
        >
          <div dangerouslySetInnerHTML={{ __html: this.props.content }} />
        </div>

        <div
          className={this.state.section == 0 ? 'col-12 col-8-l' : 'col-12 col-12-l'}
          style={{ background: '#fff', padding: '40px' }}
        >
          <DonateInline changeSection={this.changeSection} {...this.props} />
        </div>
      </div>
    );
  }
}

export default DonateInlineSection;
