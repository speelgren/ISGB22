import { Component } from 'react';
import MainCSS from './main.css';

class Main extends Component {

  render() {

    /* let c = this.props.c;
    let d = this.props.d; */
    console.log(this.props);

    let {a, b, c, d} = this.props;

    return ( <main>Detta är innehåll i Main!</main> );
  }
}

export default Main;
