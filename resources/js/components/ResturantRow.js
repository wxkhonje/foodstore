import React, {Component} from 'react';

class ResturantRow extends Component{
    render() {
        return(
            <div className="row">
                {this.props.children}
            </div>
        );
    }
}

export default ResturantRow;

