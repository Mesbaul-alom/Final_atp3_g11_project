import React, {Component} from 'react';
import  {Link} from 'react-router-dom';
import  axios from 'axios';
import swal from 'sweetalert';

 class addManager extends Component
 {

    state = {
        name:'',
        email:'',
        phone:'',
        adress:'',
        password:'',
    }

   handleInput = (e)=>{
   this.setState ({
       [e.target.name]: e.target.value
   });
}
addManager=async(e)=>{
       e.preventDefault();
       const res =await axios.post('http://localhost:8000/api/addManager',this.state);
if(res.data.status===200){
  // console.log(res.data.message)
  swal({
    title: "success!",
    text: res.data.message,
    icon: "success",
    button: "ok!",
  });
   this.setState({

           name:'',
        email:'',
        phone:'',
        adress:'',
        password:'',
   });
   }
}
  render(){


    return(

    <div className="container">
                <div className="row">
                     <div className="col-md-6">
                         <div className="card">
                             <div className="card-header">
                                    <h4> 
                                      Home page
                                       <Link to={'addmanager'} className="btn btn-primary btn-sm float-end">Add Manager</Link>
                                       <Link to={'managerlist'} className="btn btn-primary btn-sm float-end">Manager list</Link>
                                    </h4>
                            </div>
                            <div className="card-body">
                            <form onSubmit={this.addManager}>
                                    <div className="form-group mb-3">
                                        <lebel>Manager Name</lebel>
                                        <input type="text" name="name" onChange={this.handleInput} value={this.state.name}  className="form-control"/>
                                    </div>
                                    <div className="form-group mb-3">
                                        <lebel>Email</lebel>
                                        <input type="text" name="email" onChange={this.handleInput} value={this.state.email} className="form-control"/>
                                    </div>
                                    <div className="form-group mb-3">
                                        <lebel>Phone</lebel>
                                        <input type="number" name="phone" onChange={this.handleInput} value={this.state.phone} className="form-control"/>
                                    </div> 
                                    <div className="form-group mb-3">
                                        <lebel>adress</lebel>
                                        <input type="text" name="adress" onChange={this.handleInput} value={this.state.adress}  className="form-control"/>
                                    </div>
                                    <div className="form-group mb-3">
                                        <lebel>password</lebel>
                                        <input type="password" name="password" onChange={this.handleInput} value={this.state.password}  className="form-control"/>
                                    </div> 
                                    <div className="form-group mb-3">                     
                                      <button type="submit" className="btn btn-outline-primary">Add Manager</button> 
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
 export default addManager;