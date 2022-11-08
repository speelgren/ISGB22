import { Component } from 'react';
import Header from './header';
import Main from './main';
import ReactionContainer from './reactioncontainer';
import Reaction from './reaction';
import Footer from './footer';

class UIRoot extends Component {

  render() {
    return (
      
      <>
        <Header />
        <ReactionContainer />
      </>
    );
  }
}

export default UIRoot;
