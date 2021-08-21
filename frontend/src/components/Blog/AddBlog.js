import React, {Component} from 'react';
import  {Link} from 'react-router-dom';
import  axios from 'axios';
import swal from 'sweetalert';

class AddBLog extends Component
{
 		state = {
            title:'',
            category:'',
            error_list:[],
       }

    handleInput = (e)=>{
        this.setState ({
            [e.target.name]: e.target.value
        });
    }
    saveBlog = async(e) =>
    {
            e.preventDefault();
            const res =await axios.post('http://localhost:8000/api/addBlog',this.state);
            if(res.data.status===200){
                console.log(res.data.message);
                swal({
                    title: "Insert Blog!",
                    text: res.data.message,
                    icon: "success",
                    button:"Ok",
                  });
                this.setState({
                    title:'',
                    category:'',
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
                                <h4>Create Blog
                                <Link to={'/blogList'} className="btn btn-primary btn-sm float-end">Back</Link>
                                </h4>   
                            </div>
                            <div className="card-body">
                                <form onSubmit={this.saveBlog}>
                                    <div className="form-group mb-3">
                                        <lebel>Title Name</lebel>
                                        <input type="text" name="title" onChange={this.handleInput} value={this.state.title} className="form-control"/><span className="text-danger">{this.state.error_list.title}</span>
                                    </div>
                                    <div className="form-group mb-3">
                                        <lebel>Category</lebel>
                                        <input type="text" name="category" onChange={this.handleInput} value={this.state.category} className="form-control"/><span className="text-danger">{this.state.error_list.category}</span>
                                    </div>
                                    <div className="form-group mb-3">                     
                                      <button type="submit" className="btn btn-outline-primary">Post Blog</button> 
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
 export default AddBLog;