
import React, {Component} from 'react';
import {Link } from "react-router-dom";
import axios from 'axios';

 class Managerlist extends Component
 { 
    state={
        managers: [],
        loding:true,
     }
     
   async  componentDidMount(){
         const res=await axios.get('http://localhost:8000/api/managerlist');
         
         if(res.data.status===200){
            this.setState({
                managers: res.data.managers,
                loding:false,
            })
        }
        
            }
           
     deleteManager=async (e,id)=>{
         const thidClickedFunda = e.currentTarget;
         thidClickedFunda.innerText="Deleting";
        const res=await axios.delete(`http://localhost:8000/api/delete-manager/${id}`);
       if(res.data.status===200){

        thidClickedFunda.closest("tr").remove();
           console.log(res.data.message);
       }
    }
  render(){

    var manager_HTML_TABLE ="";
    if(this.state.loding){
     manager_HTML_TABLE = <tr> <td colSpan="7"> <h2>loding....</h2></td></tr>
 
    }
 
    else{
     manager_HTML_TABLE=
     this.state.managers.map((item)=>{
         return(
  <tr key={item.id}>
      <td>{item.id}</td>
      <td>{item.username}</td>
      <td>{item.email}</td>
      <td>{item.phone}</td>
      <td>{item.adress}</td>
      <td>
          
      <a href={`/edit-Manager/${item.id}`} className="btn btn-success btn-sm">Edit</a>
      </td>
      <td>
          <button type="button" onClick={(e)=> this.deleteManager(e, item.id)} className="btn btn-danger btn-sm">Delete</button>
      </td>
 
  </tr>
         );
     })
 
    }

    return(

    <div className="container">
                <div className="row">
                     <div className="col-md-12">
                         <div className="card">
                             <div className="card-header">
                                    <h4> 
                                      Manager List
                                      <Link to={'/'} className="btn btn-primary btn-sm float-end">HOME</Link>
                                       <Link to={'addmanager'} className="btn btn-primary btn-sm float-end">Add Manager</Link>
                                       <Link to={'managerlist'} className="btn btn-primary btn-sm float-end">Manager list</Link>
                                    </h4>
                            </div>
                            <div className="card-body">
                                <table className="table table-bordered table-striped">
                                    <thead>
                                       <tr>
                                           <th>Id</th>
                                           <th>Name</th>
                                           <th>email</th>
                                           <th>phone</th>
                                           <th>adress</th>
                                           <th>Edit</th>
                                           <th>Delete</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                    {manager_HTML_TABLE}
                                    
        
      
                                    </tbody>
                                </table>
                            </div>
                     </div>
                 </div>
            </div>
    </div>

    )
  }
 }
 export default Managerlist;