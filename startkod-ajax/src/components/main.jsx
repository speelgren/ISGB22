import { Component } from "react";


class Main extends Component {
    
    constructor(props) {
        super(props);

        this.state = ({

            citat: ''
        });
    }

    getCitat = () => {

        window.fetch('https://api.whatdoestrumpthink.com/api/v1/quotes/random').then( (response) => {

        return response.json();
        }).then( (data) => {

            console.log(data.message);

            this.state = {

                citat: data.message
            }
        })
        }
    

        render() { 
            
            return(
                <>
                    <div className="jumbotron text-center"><h1>Trump says</h1></div> <div className="container text-center">
                        <button onClick={this.getCitat} className="btn btn-lg btn- danger">Hämta ett citat!</button>
                    </div>
                    <div className="lead text-center mt-5">{this.state.citat}</div> 
                </>
            )
        } 
}

export default Main;