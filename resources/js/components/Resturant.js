import React, {Component} from 'react';

class Resturant extends Component{
    render() {
        return(
            <div className="card col-3 p-0 m-0.5">
                <img className="card-img-top" src={this.props.info.thumbnail} alt={this.props.info.title} />
                    <div className="card-body">
                        <h5 className="card-title">{this.props.info.district}</h5>
                        <p className="card-header">{this.props.info.cellnumber}</p>
                        <p className="card-text">{this.props.info.physicallocation}</p>
                        <a href="url" className="btn btn-primary">{this.props.info.menu}</a>
                        <span className='btn btn-primary' href={this.props.info.id}>Modal</span>
                    </div>
            </div>
        );
    }
}

export default Resturant;