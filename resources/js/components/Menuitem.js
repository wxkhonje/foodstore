import React, {Component} from 'react';
import ReactDOM from 'react-dom';

class Menuitem extends Component{
    render(){
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Menu Item from React</div>
                            <div className="card-body">I'm an example component!</div>
                            <div><button>My Button</button></div>
                        </div>
                    </div>
                </div>
            </div>
        );
    };
}

export default Menuitem;
