import { useParams,Link } from "react-router-dom";
import { useState } from "react";
import { useHistory } from "react-router-dom";




const AddProject = ({ status, callback }) => {
    const { id: eid } = useParams();
    const [project, setProject] = useState({
       title: "",
       project_file: "",
       price: "",
       time: "",
       description: "",
    });
    const history = useHistory();

    const change = (e) => {
        const attr = e.target.name;
        const val = e.target.value;
        setProject({ ...project, [attr]: val });
    };

    const onSubmit = (e) => {
        e.preventDefault();
        callback(project);
        history.push("/projectList");
    };

    return (
        <div className="container">
                <div className="row">
                    <div className="col-md-12">
                        <div className="card">
                            <div className="card-header">
                                <h4>Add Project
                                <Link to={'/projectList'} className="btn btn-primary btn-sm float-end">Back</Link>
                                </h4>   
                            </div>
                            <div className="card-body">
                                <form onSubmit={onSubmit}>
                                    <div className="form-group mb-3">
                                        <lebel>Project title</lebel>
                                        <input 
                                        type="text" 
                                        name="title" 
                                        value={project.title} 
                                        onChange={change} 
                                        className="form-control"/>
                                    </div>
                                    <div className="form-group mb-3">
                                        <lebel>Project file</lebel>
                                        <input 
                                        type="text" 
                                        name="project_file"                         
                                        value={project.project_file} 
                                        onChange={change}
                                        className="form-control"/>
                                    </div>
                                    <div className="form-group mb-3">
                                        <lebel>price</lebel>
                                        <input 
                                        type="number" 
                                        name="price" 
                                        value={project.price}
                                        onChange={change}  
                                        className="form-control"/>
                                    </div> 
                                    <div className="form-group mb-3">
                                        <lebel>Time</lebel>
                                        <input 
                                        type="text" 
                                        name="time"                                    
                                        value={project.time} 
                                        onChange={change} 
                                        className="form-control"/>
                                    </div>
                                    <div className="form-group mb-3">
                                        <lebel>Descrition</lebel>
                                        <input
                                        type="text"
                                        name="description" 
                                        value={project.description}
                                        onChange={change}
                                        className="form-control"
                                        />
                                    </div> 
                                    <div className="form-group mb-3">
                                        <input 
                                        type="submit" 
                                        value={status}/>                                      
                                      {/* <button type="submit" className="btn btn-outline-primary">Post Contest</button> */}
                                    </div>
                                </form>                 
                            </div>                          
                        </div>
                    </div>
                </div>
            </div>
    );
};

export default AddProject;


