import axios from "axios";
import { Component } from "react";
import { Link } from "react-router-dom";
import { useParams } from "react-router-dom";
import { useState } from "react";
import { useHistory } from "react-router-dom";




const AddPostContest = ({ status, callback }) => {
    const { id: eid } = useParams();
    const [contest, setContest] = useState({
       title: "",
       contest_file: "",
       price: "",
       time: "",
       description: "",
    });
    const history = useHistory();

    const change = (e) => {
        const attr = e.target.name;
        const val = e.target.value;
        setContest({ ...contest, [attr]: val });
    };

    const onSubmit = (e) => {
        e.preventDefault();
        callback(contest);
        history.push("/contestList");
    };

    return (
        <div className="container">
                <div className="row">
                    <div className="col-md-12">
                        <div className="card">
                            <div className="card-header">
                                <h4>Add Contest
                                <Link to={'/contestList'} className="btn btn-primary btn-sm float-end">Back</Link>
                                </h4>   
                            </div>
                            <div className="card-body">
                                <form onSubmit={onSubmit}>
                                    <div className="form-group mb-3">
                                        <lebel>Contest title</lebel>
                                        <input type="text" name="title" onChange={change} value={contest.title} className="form-control"/>
                                    </div>
                                    <div className="form-group mb-3">
                                        <lebel>Contest file</lebel>
                                        <input type="text" name="contest_file" onChange={change} value={contest.contest_file} className="form-control"/>
                                    </div>
                                    <div className="form-group mb-3">
                                        <lebel>price</lebel>
                                        <input type="number" name="price" onChange={change} value={contest.price} className="form-control"/>
                                    </div> 
                                    <div className="form-group mb-3">
                                        <lebel>Time</lebel>
                                        <input type="text" name="time" onChange={change} value={contest.time} className="form-control"/>
                                    </div>
                                    <div className="form-group mb-3">
                                        <lebel>Descrition</lebel>
                                        <input type="text" name="description" onChange={change} value={contest.description}className="form-control"/>
                                    </div> 
                                    <div className="form-group mb-3">
                                        <input type="submit" name="submit" value={status}/>                                      
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

export default AddPostContest;


