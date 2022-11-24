import { Component } from 'react';
import Header from './header.jsx';
import Main from './main.jsx';
import Footer from './footer.jsx';

class UIRoot extends Component {

  render() {

    return(

      <div>
        <Header />
        <Main />
        <Footer />
      </div>
    );
  }
}

export default UIRoot;
