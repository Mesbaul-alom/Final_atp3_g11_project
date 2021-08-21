import axios from 'axios';
import React, {Component} from 'react';
import  {Link} from 'react-router-dom';
import Project from '../Project/Project';
import swal from 'sweetalert';

class BlogList extends Component
 {

    state ={ 
        blogs: [],
        loading: true,
    }

   async  componentDidMount(){
        const res=await  axios.get('http://localhost:8000/api/blogList');
           console.log(res); 
           if(res.data.status===200){
               this.setState({
                   blogs: res.data.blogs,
                   loading: false,
               });
           }

        }
        deleteBlog = async (e,id)=>{
            const thid = e.currentTarget;
            thid.innerText = "Deleting Blog";
            
            const res = await axios.delete(`http://localhost:8000/api/deleteBlog/${id}`);
            if(res.data.status===200)
            {
                thid.closest("tr").remove();
                swal({
                    title: "Deleted Blog!",
                    text: res.data.message,
                    icon: "success",
                    button:"Ok",
                  }); 
                console.log(res.data.message);
            }
        }
    

  render(){
    
    var blog_HTML_TABLE = "" ;
    if(this.state.loading)
    {
        blog_HTML_TABLE = <tr><td colSpan="4"><h2>Loading...</h2></td></tr>
    } 
    else
    {
        blog_HTML_TABLE = this.state.blogs.map((item)=>{
            return(
                <tr>
                    <td>{item.id}</td>
                    <td>{item.title}</td>
                    <td>{item.category}</td>
                    <td>
                    <button onClick={(e)=>this.deleteBlog(e,item.id)} className="btn btn-danger">Delete</button>                    
                    </td>
                    <td>
                    <Link className="btn btn-success" to={`/editBlog/${item.id}`}>Edit Blog</Link>
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
                                      Blog List
                                       <Link to={'/addBlog'} className="btn btn-primary btn-sm float-end">Create Blog</Link>
                                    
                                    </h4>
                            </div>
                            <div className="card-body">
                                <table className="table table-bordered table-striped">
                                    <thead>
                                       <tr>
                                           <th>Id</th>
                                           <th>Title</th>
                                           <th>Category</th>
                                           <th>Edit</th>
                                           <th>Delete</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                        {blog_HTML_TABLE}
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
 export default BlogList;