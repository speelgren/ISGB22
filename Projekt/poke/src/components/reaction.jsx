import { Component } from 'react';
import { Link } from 'react-router-dom';

class Reaction extends Component {

  render() {

    let {id, name, image} = this.props;

    return (

      <div className='pokemon-card'>
        <img className ='pokemon-card-image' alt='Pokémon' src={image} />
        <p className='pokemon-card-id'>#{id}</p>
        <p className='pokemon-card-name'>{name}</p>
        <Link to={'/view/' + id} className='pokemon-card-view' >View</Link>
      </div>
    );
  }
}

export default Reaction;
