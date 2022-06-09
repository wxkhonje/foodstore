import React, {Component} from 'react';
import ReactDOM from 'react-dom';

class Component2 extends Component{
    constructor(props) {
        super(props);

        this.state = {
            message: "Welcome to Component 2"
        }

    };

    async componentDidMount() {
        const res = await axios.get("/api/testaxios");
        this.setState({message: res.data.title});
    }


    render() {
        return(
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">{this.state.message}</div>

                            <div className="card-body">I'm an example component 2!</div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default Component2;

