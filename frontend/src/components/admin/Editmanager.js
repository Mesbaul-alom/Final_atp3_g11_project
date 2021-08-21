import React, {Component} from 'react';
import  {Link} from 'react-router-dom';
import  axios from 'axios';
import swal from 'sweetalert';

 class Editmanager extends Component
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

async  componentDidMount(){
    const man_id=this.props.match.params.id;
    //console.log(man_id);
    const res=await axios.get(`http://localhost:8000/api/edit-manager/${man_id}`);
    if(res.data.status===200){
        this.setState({
            name:res.data.manager.username,
            email:res.data.manager.email,
            phone:res.data.manager.phone,
            adress:res.data.manager.adress,
            password:res.data.manager.password,
          
        })
    }

   }
       
updateManager=async(e)=>{
       e.preventDefault();
       document.getElementById('updatebtn').disabled=true;
       document.getElementById('updatebtn').innerText="updateing";
       const man_id=this.props.match.params.id;
       const res = await axios.put(`http://localhost:8000/api/update-manager/${man_id}`,this.state);
       if(res.data.status===200){
       // console.log(res.data.message);
       swal({
        title: "success!",
        text: res.data.message,
        icon: "success",
        button: "ok!",
      });
        document.getElementById('updatebtn').disabled=false;
        document.getElementById('updatebtn').innerText="updated Manager";
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
                                      Edit Manager
                                       <Link to={'/'} className="btn btn-primary btn-sm float-end">Back Home</Link>
                                       
                                    </h4>
                            </div>
                            <div className="card-body">
                            <form onSubmit={this.updateManager}>
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
                                      <button type="submit" id="updatebtn" className="btn btn-outline-primary">Update Manager</button> 
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
 export default Editmanager;