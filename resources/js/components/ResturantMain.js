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
                    <Resturant info={{
                        thumbnail:d.image_path,
                        title:d.name,
                        district:d.district,
                        cellnumber:d.cellnumber,
                        physicallocation:d.physicallocation,
                        menu:d.name,
                        id:d.id
                    }} />
                ))} 
            </ResturantRow>
        );
    }
};

export default ResturantMain;