import { Component } from "react";
import { Link } from "react-router-dom";


const Project= ({
    id,
    title,
    project_file,
    price,
    time,
    description,
    deletecallback,
}) => {
    return (
        <div>
          <div className="container">
             <h4>
                </h4> 
                    <div className="col-md-12">
                        <div className="card"  class="col-md-4">
                            <div className="card-header">
                            <img  class="card-img-top" src={'/protfolio_img/',project_file} alt="Card image cap"/>    
                            <h2>Project Title: {title}</h2>      
                        </div>
                    </div>
                    <div className="card-body">
                        <h3>Price: {price}</h3>
                        <h3>Time: {time}</h3>
                        <h3>Description: {description}</h3>
                        <button className="btn btn-danger" onClick={() => deletecallback(id)}>Delete</button>
                        <Link className="btn btn-success" to={`/editEmployee/${id}`}>Download Project</Link>
                    </div>
                    </div>
                </div>
         </div> 
    );
};

export default Project;

