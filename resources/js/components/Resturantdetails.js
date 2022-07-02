import React, {Component} from 'react';
import ReactDOM from 'react-dom';

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

        const [show, setShow] = useState(false);
        const handleClose = () => setShow(false);
        const handleShow = () => setShow(true);           
    }


    render() {
        return(
            <button className='btn btn-primary'>Details</button>
        );
    }
}

export default Resturantdetails;