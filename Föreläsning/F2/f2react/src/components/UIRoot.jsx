import { Component } from 'react';
import Header from './header';
import Main from './main';
import Footer from './footer';

class UIRoot extends Component {

  render() {

    let data = { a : 5, b : 10, c : 15, d : 20 };


    return (
      <>
        <Header />
        <Main {...data}/>
        <Footer />
      </>
    );
  }
}

export default UIRoot;
