import React, {Component} from 'react';
import  {Link} from 'react-router-dom';
import  axios from 'axios';
import swal from 'sweetalert';

 class Editproject extends Component
 {

    state = {
        title:'',
        price:'',
        time:'',
        description:'',
    }

   handleInput = (e)=>{
   this.setState ({
       [e.target.name]: e.target.value
   });
}

async  componentDidMount(){
    const project_id=this.props.match.params.id;
    //console.log(man_id);
    const res=await axios.get(`http://localhost:8000/api/edit-project/${project_id}`);
    if(res.data.status===200){

        this.setState({
            title:res.data.buyer.title,
            price:res.data.buyer.price,
            time:res.data.buyer.time,
            description:res.data.buyer.description,
            
          
        })
      
    }

   }
       
   updateProject=async(e)=>{
       e.preventDefault();
       document.getElementById('updatebtn').disabled=true;
       document.getElementById('updatebtn').innerText="updateing";
       const project_id=this.props.match.params.id;
       const res = await axios.put(`http://localhost:8000/api/update-project/${project_id}`,this.state);
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
                                      Edit Projecct
                                       <Link to={'/'} className="btn btn-primary btn-sm float-end">Back Home</Link>
                                       
                                    </h4>
                            </div>
                            <div className="card-body">
                            <form onSubmit={this.updateProject}>
                                    <div className="form-group mb-3">
                                        <lebel>Project title</lebel>
                                        <input type="text" name="title" onChange={this.handleInput} value={this.state.title}  className="form-control"/>
                                    </div>
                                    <div className="form-group mb-3">
                                        <lebel>Price</lebel>
                                        <input type="text" name="price" onChange={this.handleInput} value={this.state.price} className="form-control"/>
                                    </div>
                                    <div className="form-group mb-3">
                                        <lebel> Time</lebel>
                                        <input type="date" name="time" onChange={this.handleInput} value={this.state.time} className="form-control"/>
                                    </div> 
                                    <div className="form-group mb-3">
                                        <lebel>Discription</lebel>
                                        <input type="text" name="description" onChange={this.handleInput} value={this.state.description}  className="form-control"/>
                                    </div>
                                   
                                    <div className="form-group mb-3">                     
                                      <button type="submit" id="updatebtn" className="btn btn-outline-primary">Update Project</button> 
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
 export default Editproject;