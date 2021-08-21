import React, {Component} from 'react';
import  {Link} from 'react-router-dom';

 class Home extends Component
 {
  render(){


    return(

    <div className="container">
                <div className="row">
                     <div className="col-md-12">
                         <div className="card">
                             <div className="card-header">
                                    <h4> 
                                      Welcome to admin page

                                      <Link to={'profile'} className="btn btn-primary btn-sm float-end">Profile</Link>
                                       <Link to={'addmanager'} className="btn btn-primary btn-sm float-end">Add Manager</Link>
                                       <Link to={'managerlist'} className="btn btn-primary btn-sm float-end">Manager list</Link>
                                    </h4>
                            </div>
                            <div className="card-header float-right">
                                    
                                      <Link to={'projectlist'} className="btn btn-primary btn-sm float-end">Project list</Link><br></br><br></br>
                                       <Link to={'contestlist'} className="btn btn-primary btn-sm float-end">Contest list</Link>
                                       
                                    
                            </div>
                            <div className="card-body">
                            </div>
                     </div>
                 </div>
            </div>
    </div>

    )
  }
 }
 export default Home;