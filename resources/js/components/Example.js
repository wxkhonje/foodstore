import React, {Component} from 'react';
import ReactDOM from 'react-dom';

class Example extends Component{

    constructor(props){
        super(props);
        //this.getPosts() = this.getPosts().bind(this);
        this.state = {
            posts: [],
            message: ""
        };

        this.ChangeMessage = this.ChangeMessage.bind(this);
        this.MyPosts = this.MyPosts.bind(this);
        this.Posts = this.Posts.bind(this);
    }

    //React Life Cycle Methods
    componentDidMount() {
        this.MyPosts();
        //this.setState({message: "Welcome"});
    }

    MyPosts(){
        let self = this;
        axios.get("/api/testaxios")
            .then(
                //console.log(this);
                function (response){
                    self.setState({message: response.data.title});
                }
            );
    };

        async Posts(){
                const res = await axios.get("/api/testaxios");
                console.log(res);
                this.setState({message: res.data.title});
    }

    ChangeMessage()
    {
        //this.getPosts();
        this.setState({message: 'We shall bind the results using a button'});
    }

    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">This component utilises Axios to get data from backend</div>
                            <div className="card-body">{this.state.message}</div>
                            <button type="button" className="btn-info" onClick={this.ChangeMessage}>Click Me</button>
                        </div>
                    </div>
                </div>
            </div>);
    }
}

export default Example;

