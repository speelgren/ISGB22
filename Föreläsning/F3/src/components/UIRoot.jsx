import { Component } from 'react';
import Header from './Header';
import Main from './Main';
import Footer from './Footer';

class UIRoot extends Component {

  render() {

    let c = {
      r:255,
      b:250,
      g:100
    }

      return (
        <>
        <Header/>
        <Main h="100" {...c}/>
        <Footer/>
        </>
      );
  }
}

export default UIRoot;
