import { Component } from 'react';
import Header from './header';
import Main from './main';
import Reactioncontainer from './reactioncontainer';
import Reaction from './reaction';
import Footer from './footer';

class UIRoot extends Component {

  render() {
    return (
      <>
        <Header />
        <Main />
        <Reactioncontainer />
        <Reaction />
        <Footer />
      </>
    );
  }
}

export default UIRoot;
