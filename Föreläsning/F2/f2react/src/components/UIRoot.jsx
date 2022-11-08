import { Component } from 'react';
import Header from './header';
import Main from './main';
import Footer from './footer';

class UIRoot extends Component {

  render() {

    return (
      <>
        <Header />
        <Main c='100' d ='200'/>
        <Footer />
      </>
    );
  }
}

export default UIRoot;
