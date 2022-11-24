import { Component } from 'react';
import { Link } from 'react-router-dom';

class Reaction extends Component {

  render() {

    let {id, name, image} = this.props;

    return (

      <div className='container-fluid mt-3 mb-3'>
        <img className ='card' alt='Pokémon' src={image} />
            <p className='card-text'>#{id} {name}</p>
            <Link to={'/view/' + id} className='btn btn-primary'>View</Link>
      </div>
    );
  }
}

export default Reaction;
