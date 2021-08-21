import React, {Component} from 'react';
import  {Link} from 'react-router-dom';
import  axios from 'axios';
import swal from 'sweetalert';

class AddProject extends Component
{
 		state = {
            title:'',
            project_file:'',
            price: '',
            time: '',
            error_list: [],
        	// description: '',
       }

    handleInput = (e)=>{
        this.setState ({
            [e.target.name]: e.target.value
        });
    }
    saveProject = async(e) =>
    {
            e.preventDefault();
            const res =await axios.post('http://localhost:8000/api/postProject',this.state);
            if(res.data.status===200){
                console.log(res.data.message);
                swal({
                    title: "Insert Project!",
                    text: res.data.message,
                    icon: "success",
                    button:"Ok",
                  });
                this.setState({
                    title:'',
                    project_file:'',
                    price: '',
                    time: '',
                    // description: '',
                });
            }
            else
            {
                this.setState({
                    error_list: res.data.validate_err,
                });
            }
    }
    render()
    {

 	  return(

 		<div className="container">
                <div className="row">
                    <div className="col-md-12">
                        <div className="card">
                            <div className="card-header">
                                <h4>Post Project
                                <Link to={'/projectList'} className="btn btn-primary btn-sm float-end">Back</Link>
                                </h4>   
                            </div>
                            <div className="card-body">
                                <form onSubmit={this.saveProject}>
                                    <div className="form-group mb-3">
                                        <lebel>Title Name</lebel>
                                        <input type="text" name="title" onChange={this.handleInput} value={this.state.title} className="form-control"/><span className="text-danger">{this.state.error_list.title}</span>
                                    </div>
                                    <div className="form-group mb-3">
                                        <lebel>Project File</lebel>
                                        <input type="text" name="project_file" onChange={this.handleInput} value={this.state.project_file} className="form-control"/><span className="text-danger">{this.state.error_list.project_file}</span>
                                    </div>
                                    <div className="form-group mb-3">
                                        <lebel>Price</lebel>
                                        <input type="number" name="price" onChange={this.handleInput} value={this.state.price} className="form-control"/><span className="text-danger">{this.state.error_list.price}</span>
                                    </div>
                                    <div className="form-group mb-3">
                                        <lebel>Time</lebel>
                                        <input type="text" name="time" onChange={this.handleInput} value={this.state.time} className="form-control"/><span className="text-danger">{this.state.error_list.time}</span>
                                    </div>
                                    <div className="form-group mb-3">                     
                                      <button type="submit" className="btn btn-outline-primary">Post Project</button> 
                                    </div>
                                </form>                 
                            </div>                          
                        </div>
                    </div>
                </div>
            </div>
 		)
 	}
 }
 export default AddProject;




