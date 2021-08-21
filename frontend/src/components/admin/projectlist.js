
import React, {Component} from 'react';
import {Link } from "react-router-dom";
import axios from 'axios';

 class Projectlist extends Component
 { 
    state={
        buyers: [],
        loding:true,
     }
     
   async  componentDidMount(){
         const res=await axios.get('http://localhost:8000/api/projectlist');
         
         if(res.data.status===200){
            this.setState({
                buyers: res.data.buyers,
                loding:false,
            })
        }
        
            }
           
            deleteBuyer=async (e,id)=>{
         const thidClickedFunda = e.currentTarget;
         thidClickedFunda.innerText="Deleting";
        const res=await axios.delete(`http://localhost:8000/api/delete-buyer/${id}`);
       if(res.data.status===200){

        thidClickedFunda.closest("tr").remove();
           console.log(res.data.message);
       }
    }
  render(){

    var buyer_HTML_TABLE ="";
    if(this.state.loding){
     buyer_HTML_TABLE = <tr> <td colSpan="6"> <h2>loding....</h2></td></tr>
 
    }
 
    else{
     buyer_HTML_TABLE=
     this.state.buyers.map((item)=>{
         return(
  <tr key={item.id}>
      
      <td>{item.title}</td>
      <td>{item.price}</td>
      <td>{item.time}</td>
      <td>{item.description}</td>
      <td>
          
      <a href={`/edit-project/${item.id}`} className="btn btn-success btn-sm">Edit</a>
      </td>
      <td>
          <button type="button" onClick={(e)=> this.deleteBuyer(e, item.id)} className="btn btn-danger btn-sm">Delete</button>
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
                                      Project list
                                      <Link to={'/'} className="btn btn-primary btn-sm float-end">HOME</Link>
                                       <Link to={'addmanager'} className="btn btn-primary btn-sm float-end">Add Manager</Link>
                                       <Link to={'managerlist'} className="btn btn-primary btn-sm float-end">Manager list</Link>
                                    </h4>
                            </div>
                        
                            <div className="card-body">
                                <table className="table table-bordered table-striped">
                                    <thead>
                                       <tr>
                                          <th>title</th>
                                           <th>price</th>
                                           <th>time</th>
                                           <th>Description</th>
                                           <th>Edit</th>
                                           <th>Delete</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                    {buyer_HTML_TABLE}
                                    
        
      
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
 export default Projectlist;