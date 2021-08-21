import React, {Component} from 'react';
import  {Link} from 'react-router-dom';
import  axios from 'axios';
import { useParams,params } from "react-router-dom";
import { useState } from "react";
import { useHistory } from "react-router-dom";
import swal from 'sweetalert';

class EditBlog extends Component
{
 		state = {
            title:'',
            category:'',
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
        const blog_id = this.props.match.params.id;
        console.log(blog_id);
        const res = await axios.get(`http://127.0.0.1:8000/api/editBlog/${blog_id}`);
        if(res.data.status===200)
        {
            this.setState({
                title:res.data.blog.title,
                category:res.data.blog.category,
            });
        } 

    }


    updateBlog = async(e) =>
    {
        e.preventDefault();
         
        document.getElementById('updatebtn').disabled = false;
        document.getElementById('updatebtn').innerHTML = "Updating blog";
        const blog_id = this.props.match.params.id;
            const res =await axios.put(`http://localhost:8000/api/updateBlog/${blog_id}`,this.state);
            if(res.data.status===200){
                console.log(res.data.message)  ;
                swal({
                    title: "Update Blog",
                    text: res.data.message,
                    icon: "success",
                    button:"Ok",
                  });
                document.getElementById('updatebtn').disabled = false;
                document.getElementById('updatebtn').innerHTML = "Update Blog";    
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
                                <h4>Edit Blog
                                <Link to={'/blogList'} className="btn btn-primary btn-sm float-end">Back</Link>
                                </h4>   
                            </div>
                            <div className="card-body">
                                <form onSubmit={this.updateBlog}>
                                    <div className="form-group mb-3">
                                        <lebel>Title Name</lebel>
                                        <input type="text" name="title" onChange={this.handleInput} value={this.state.title} className="form-control"/><span className="text-danger">{this.state.error_list.title}</span>
                                    </div>
                                    <div className="form-group mb-3">
                                        <lebel>Category</lebel>
                                        <input type="text" name="category" onChange={this.handleInput} value={this.state.category} className="form-control"/><span className="text-danger">{this.state.error_list.category}</span>
                                    </div>
                                    <div className="form-group mb-3">                     
                                      <button id="updatebtn" type="submit" className="btn btn-outline-primary">Update Blog</button> 
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
 export default EditBlog ;




