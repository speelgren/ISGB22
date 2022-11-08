import { Component } from 'react';

class Main extends Component {

  render() {

    let c = this.props.c;
    let d = this.props.d;

    return ( <main>{ c * d }</main> );
  }
}

export default Main;
