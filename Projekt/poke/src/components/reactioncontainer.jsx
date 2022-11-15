import { Component } from 'react';
import Reaction from './reaction';

class ReactionContainer extends Component {

  constructor() {
    super();

    this.state = {
      pokeList: Array()
    }

    this.setDummy();
  }

  setDummy() {

    this.state.pokeList = [
      {
        "id": 1,
        "name": "Bulbasaur",
        "image": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon"
      },
      {
        "id": 2,
        "name": "Ivysaur",
        "image": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon"
      },
      {
        "id": 3,
        "name": "Venosaur",
        "image": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon"
      }
    ]

    this.state.dummyList = this.state.pokeList;
  }

  filter = (e) => {

    let text = e.target.value.toLowerCase();
    let pokemons = this.state.pokeList;

    let search = pokemons.filter(p => p.name.toLowerCase().includes(text))

    this.setState({
      dummyList: search
    })
  }

  render() {

    return (
      <div className='pokemon-container'>
        <h1 className='pokemon-title'>Pokémon list</h1>
        <div>
          <input type='text' onChange={this.filter} />
        </div>

        {
          this.state.dummyList.length <= 0 ? (
            <h2>No Pokemon found</h2>
          ) : (

            this.state.dummyList.map((item, index) => {

              return <Reaction key={index} name={item.name} image={item.image + '/' + item.id + '.png'}/>
            })
          )
        }

      </div>
    );
  }
}

export default ReactionContainer;
