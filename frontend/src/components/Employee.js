import { Link } from "react-router-dom";
import "./Style.css";

const Employee = ({
    id,
    name,
    user_name,
    company_name,
    contact,
    deletecallback,
}) => {
    return (
        <div className="user" style={{ color: "red" }}>
            <h1>ID: {id}</h1>
            <h3>Name: {name}</h3>
            <h3>User Name: {user_name}</h3>
            <h3>Company Name: {company_name}</h3>
            <h3>Contact: {contact}</h3>
            <button onClick={() => deletecallback(id)}>Delete</button>
            <Link to={`/editEmployee/${id}`}> Edit </Link>
        </div>
    );
};

export default Employee;
