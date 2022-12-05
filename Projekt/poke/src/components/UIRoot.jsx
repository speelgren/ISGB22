import { Component } from 'react';
import { Routes, Route } from 'react-router-dom';
import Header from './header';
import Main from './main';
import ReactionContainer from './reactioncontainer';
import SingleView from './SingleView';
import Reaction from './reaction';
import Footer from './footer';

class UIRoot extends Component {

  constructor(props) {
    super(props);

    this.state = {

      pokeData : null
    };
  }

  getReactionContainer() {

    if(this.state.pokeData != null) {

      console.log(this.state.pokeData);
      return <ReactionContainer list={ this.state.pokeData }/>
    } else {

      return <div>Error</div>
    }
  }

  componentDidMount() {

    window.fetch('https://pokeapi.co/api/v2/pokemon?limit=6&offset=0').then( response => {

      return response.json()
    }).then( data => {

      let poke = data.results;

      poke.forEach( (p, index) => {

        p.id = index + 1;
      });

      this.setState({pokeData : poke})
    }).catch( error => {

      console.log( error );
    });
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
