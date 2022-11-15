import { Component } from 'react';
import { Routes, Route } from 'react-router-dom';
import Header from './header';
import Main from './main';
import ReactionContainer from './reactioncontainer';
import SingleView from './SingleView';
import Reaction from './reaction';
import Footer from './footer';

class UIRoot extends Component {

  getReactionContainer() {

    return <ReactionContainer />
  }

  render() {

    return (

      <>
        <Header />
        <Routes>
          <Route path='/' element={this.getReactionContainer()} />
          <Route path='/view/:id' element={<SingleView />} />
        </Routes>
        <Main />
        <Footer />
      </>
    );
  }
}

export default UIRoot;
