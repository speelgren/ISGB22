import { Component } from 'react';

class Reaction extends Component {

  render() {

    let {id, name, image} = this.props;

    return (

      <div className='pokemon-card'>
        <img className ='pokemon-card-image' alt='Pokémon' src={image} />
        <p className='pokemon-card-id'>#{id}</p>
        <p className='pokemon-card-name'>{name}</p>
        <a href='#' className='pokemon-card-view'>View></a>
      </div>
    );
  }
}

export default Reaction;
