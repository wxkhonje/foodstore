import React, {Component} from 'react';
import { Link } from 'react-router-dom';
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
            const Fragment = React.Fragment;
            const rowsize = 4;
            let resturantinfo = {};

            let resturantdata = this.state.FoodstoreList.map((rest)=>{
                resturantinfo = {
                                    thumbnail:'./images/'+rest.image_path,
                                    title:rest.name,
                                    district:rest.district,
                                    cellnumber:rest.cellnumber,
                                    physicallocation:rest.physicallocation,
                                    menu:rest.name,
                                    id:rest.id                    
                };

                return <Resturant key={rest.id} info={resturantinfo} />
            }).reduce((r, element, index)=>{
                index % rowsize === 0 && r.push([]);
                r[r.length - 1].push(element);
                return r;
            }, [])
            .map((result, index) =>{
                return <ResturantRow key={index}>{result}</ResturantRow>
            });

            return (
                <Fragment>
                    {resturantdata}
                </Fragment>
                );}
};

export default ResturantMain;