import React, { Component } from 'react';
import { Link, useParams } from 'react-router-dom';

const withParams = (SingleView) => {

  return props => <SingleView {...props} params={useParams()} />
}

class SingleView extends Component {

  constructor(props) {
    super(props);

    console.log(this.props);
  }

  render() {

    return (

      <div>
        <Link className='btn btn-primary' to='/'>Back</Link>
        <h4>ID: {this.props.params.id}</h4>
      </div>
    );
  }
}

export default withParams(SingleView);
