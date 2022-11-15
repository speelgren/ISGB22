import { Component } from 'react';

class Main extends Component {
  constructor(props) {
    super(props);

    console.log(this.props.r);
    console.log(this.props.h);

    let {r, g, b} = this.props;
    this.state = {
      r: r,
      g: g,
      b: b
    }
  }

  randomColor = () => {

    this.setState(
      {
      r: Math.floor(Math.random() * 255),
      g: Math.floor(Math.random() * 255),
      b: Math.floor(Math.random() * 255)
      }
    )
  }

  render() {
      //Skapar CSS för färg och höjd
      let css = {
        backgroundColor : 'rgb(' + this.state.r + ', ' + this.state.g + ', ' + this.state.b + ')',
        height : this.props.h + "px"
      };

      return (
        <>
          <main style={css}>
            <p>Detta är main</p>
            <button onClick={this.randomColor}>Byt Färg</button>
          </main>

        </>
      );
  }
}

export default Main;
