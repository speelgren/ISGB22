import { Component } from 'react';
import Reaction from './reaction';

class ReactionContainer extends Component {

  constructor() {
    super();

    this.state = {
      pokeList: this.props.list
    }

    this.defaultlist = this.state.list;
  }

  filter = (e) => {

    let text = e.target.value.toLowerCase();
    let pokemons = this.state.pokeList;
    let search = pokemons.filter( (p) => p.name.toLowerCase().includes(text))

    if(text.lengt <= 0 || text == '') {

      this.setState({pokeList : this.defaultlist});
    }
  }

  render() {

    return (
      <div className='container-fluid'>
        <h1 className='title'>Pokémon List</h1>
        <div>
          <input type='text' onChange={this.filter} />
        </div>

        {
          this.state.dummyList.length <= 0 ? (
            <h2>No Pokemon found</h2>
          ) : (

            this.state.dummyList.map( (item, index) => {

              return <Reaction key={index} name={item.name} id={item.id} image={item.image + '/' + item.id + '.png'}/>
            })
          )
        }

      </div>
    );
  }
}

export default ReactionContainer;
