import { Component } from 'react';
import Reaction from './reaction';

class ReactionContainer extends Component {

  render() {

    return (
      <div>
        <h1>Pokémon list</h1>
        <div>
          <input type='text' />
        </div>

        <Reaction />
      </div>
    );
  }
}

export default ReactionContainer;
