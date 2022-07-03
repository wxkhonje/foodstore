import React, {Component} from 'react';
import Resturant from "./Resturant";
import ResturantRow from "./ResturantRow";

class ResturantMain extends Component{
    constructor(props) {
        super(props);

        this.state = {
            message: "Message"
        };   

        this.state = {
            FoodstoreList: []
        };

    };

    async componentDidMount() {
        const res = await axios.get("/api/testaxios");
        this.setState({FoodstoreList:res.data})
        this.setState({message: "res.data.name"});   
        
        console.log(this.state.FoodstoreList);
    }

    render() {

        let resturantinfo = {};
        let resturantdata = this.state.FoodstoreList.map((restura)=>{
            resturantinfo = {
                thumbnail:restura.image_path,
                title:restura.name,
                district:restura.description,
                cellnumber:restura.cellnumber,
                physicallocation:restura.contactperson,
                menu:restura.category                
            }

            return <Resturant key={restura.id} info={resturantinfo} />
        })

        return(
            <ResturantRow>
                {this.state.FoodstoreList.map(d => (

                <div className="card" key={d.id}>
                <img className="card-img-top" src={d.name} alt={d.name} />
                    <div className="card-body">
                        <h5 className="card-title">{d.name}</h5>
                        <p className="card-header">{d.name}</p>
                        <p className="card-text">{d.name}</p>
                        <a href="url" className="btn btn-primary">{d.name}</a>
                        <span className='btn btn-primary'>{d.name}</span>
                    </div>
                </div>
                ))} 
                <Resturant info={{
                                    thumbnail:'images/1656440563-Spaghetti-1.jpg',
                                    title:this.state.message,
                                    district:'Blantyre',
                                    cellnumber:'+265999319496',
                                    physicallocation:'Behind Reserve Bank',
                                    menu:this.state.message
                }} />
            </ResturantRow>
        );
    }
};

export default ResturantMain;