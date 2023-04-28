import React, {Component} from 'react';

class ResturantRow extends Component{
    render() {
        return(
            <div className="row gx-5">
                {this.props.children}
            </div>
        );
    }
}

export default ResturantRow;

