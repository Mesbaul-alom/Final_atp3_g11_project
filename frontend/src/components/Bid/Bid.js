import { Component } from "react";
import { Link } from "react-router-dom";


const Bid = ({
    id,
    title,
    price,
}) => {
    return (
        <div>
          <div className="container">
             <h4>
                </h4> 
                    <div className="col-md-12">
                        <div className="card"  class="col-md-4">
                            <div className="card-header">
                            <iframe  class="card-img-top" src={'/protfolio_img/'} alt="Card image cap"/>    
                            <h2>Bid Title: {title}</h2>      
                        </div>
                    </div>
                    <div className="card-body">
                        <h3>Bidding price: {price}</h3>
                        <Link to={"/"} className="btn btn-primary btn-sm">Details about prjects</Link>
                        <Link to={"/seller_bidingproject"} className="btn btn-warning">Entry</Link> 
                    </div>
                    </div>
                </div>
         </div> 
    );
};

export default Bid;

