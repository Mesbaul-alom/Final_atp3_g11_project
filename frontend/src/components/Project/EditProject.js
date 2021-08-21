import React, {Component} from 'react';
import  {Link} from 'react-router-dom';
import  axios from 'axios';
import { useParams,params } from "react-router-dom";
import { useState } from "react";
import { useHistory } from "react-router-dom";
import swal from 'sweetalert';

class EditProject extends Component
{
 		state = {
            title:'',
            project_file:'',
            price: '',
            time: '',
            error_list:[],
        	// description: '',
       }

    handleInput = (e)=>{
        this.setState ({
            [e.target.name]: e.target.value
        });
    }
     
   
    async componentDidMount()
    {
        const pro_id = this.props.match.params.id;
        // console.log(pro_id);
        const res = await axios.get(`http://127.0.0.1:8000/api/editProject/${pro_id}`);
        if(res.data.status===200)
        {
            this.setState({
                title:res.data.project.title,
                project_file:res.data.project.project_file,
                price: res.data.project.price,
                time: res.data.project.time,
            });
        } 

    }


    updateProject = async(e) =>
    {
        e.preventDefault();
        document.getElementById('updatebtn').disabled = false;
        document.getElementById('updatebtn').innerHTML = "Updating project";
        const pro_id = this.props.match.params.id;
            const res =await axios.put(`http://localhost:8000/api/updateProject/${pro_id}`,this.state);
            if(res.data.status===200){
                console.log(res.data.message); 
                swal({
                    title: "Update project",
                    text: res.data.message,
                    icon: "success",
                    button:"Ok",
                  });
                   
                document.getElementById('updatebtn').disabled = false;
                document.getElementById('updatebtn').innerHTML = "Update Project";
                        
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
                                <h4>Edit Project
                                <Link to={'/projectList'} className="btn btn-primary btn-sm float-end">Back</Link>
                                </h4>   
                            </div>
                            <div className="card-body">
                                <form onSubmit={this.updateProject}>
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
                                      <button id="updatebtn" type="submit" className="btn btn-outline-primary">Update Project</button> 
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
 export default EditProject ;




