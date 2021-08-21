import { Component } from "react";
import { Link } from "react-router-dom";


const Bidder = ({
    id,
    buyer_id,
    username,
    description,

}) => {
    return (
        <div>
            <div class="container">
                <h1 style={{textAlign:"center"}}> Seller Who bid these project</h1>
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Username</th>
                        
                        <th scope="col">Communication</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <tr>
                        <td>{buyer_id}</td>
                        <td>{username}</td>
                        
                        <td><a class="btn btn-primary" href="/">Message</a>
                            <a class="btn btn-danger" href="/">Details</a>    
                        </td>
                        </tr>  
                    </tbody>
                    </table>
            </div>

        </div> 
    );
};

export default Bidder;

