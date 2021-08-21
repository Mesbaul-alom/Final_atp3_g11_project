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
                        
                        <td><a class="btn btn-primary" href="/seller_bidingproject">Message</a>
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

