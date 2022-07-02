import React, {Component} from 'react';
import ReactDOM from 'react-dom';
//import Modal from "./components/Modal";

class Resturantdetails extends Component{
    constructor(props) {
        super(props);

        this.state = {
            message: "Welcome to Component 2"
        }     

    };

    async componentDidMount() {
        const res = await axios.get("/api/testaxios");
        this.setState({message: res.data.title});    
        
        const [isOpen, setIsOpen] = useState(false);
    }


    render() {
        return(
            <>
                <button className='btn btn-primary' onClick={test}>Details</button>
            </>
        );

        function test()
        {
            return <p>Welcome to React Event Handlers</p>;
        }

    }
}

export default Resturantdetails;