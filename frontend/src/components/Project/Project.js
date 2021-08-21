import axios from 'axios';
import React, {Component} from 'react';
import  {Link} from 'react-router-dom';
import swal from 'sweetalert';


class Project extends Component
 {


    state ={ 
        projects: [],
        loading: true,
    }

   async  componentDidMount(){
        const res= await  axios.get('http://localhost:8000/api/projectList');
           console.log(res); 
           if(res.data.status===200){
               this.setState({
                   projects: res.data.projects,
                   loading: false,
               });
           }
        }

    deleteProject = async (e,id)=>{
        const thid = e.currentTarget;
        thid.innerText = "Deleting project";
        
        const res = await axios.delete(`http://localhost:8000/api/deleteProject/${id}`);
        if(res.data.status===200)
        {
            thid.closest("tr").remove();
            swal({
                title: "Deleted Project!",
                text: res.data.message,
                icon: "success",
                button:"Ok",
              }); 
            console.log(res.data.message);
        }
    } 

    render()
    {
       
    var project_HTML_TABLE = "" ;
    if(this.state.loading)
    {
        project_HTML_TABLE = <tr><td colSpan="8"><h2>Loading...</h2></td></tr>
    } 
    else
    {
        project_HTML_TABLE = this.state.projects.map((item)=>{
            return(
                <tr>
                    
                    <td>{item.id}</td>
                    <td>{item.title}</td>
                    <td>{item.project_file}</td>
                    <td>{item.price}</td>
                    <td>{item.time}</td>
                    {/* <td>{item.description}</td> */}
                    <td>
                    <button onClick={(e)=>this.deleteProject(e,item.id)} className="btn btn-danger">Delete</button>                    
                    </td>
                    <td>
                    <Link className="btn btn-success" to={`/editProject/${item.id}`}>Edit Project</Link>
                    </td>
                </tr>
            )
        })
    } 
        
         
        return(
            <div className="container">
                        <div className="row">
                             <div className="col-md-12">
                                 <div className="card">
                                     <div className="card-header">
                                            <h4> 
                                            
                                               <Link to={'/postProject'} className="btn btn-primary btn-sm">Post Project</Link>
                                            
                                            </h4>
                                    </div>
                                    <div className="card-body">
                                        <table className="table table-bordered table-striped">
                                            <thead>
                                               <tr>
                                                <th>Id</th>
                                                <th>Title</th>
                                                <th>ProjectFile</th>
                                                <th>Price</th>
                                                <th>Time</th>
                                                {/* <th>Description</th> */}
                                                <th>Edit</th> 
                                                <th>Delete</th>
                                               </tr>
                                            </thead>
                                            <tbody>
                                                {project_HTML_TABLE}
                                               
                                            </tbody>
                                        </table>
                                    </div>
                             </div>
                         </div>
                    </div>
            </div>
        
            )

    }



   
};

export default Project;

