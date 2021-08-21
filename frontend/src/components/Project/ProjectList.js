import Project from "./Project";
import { Link } from "react-router-dom";
const ProjectList = ({ projects, callback }) => {
    return (
        <div>
        <div>
            {/* <Link to={'/postProject'} className="btn btn-primary btn-sm">Post Project</Link> */}
        </div>
              {projects.map((project) => {
                return (
                    <Project
                        key={project.id}
                        {...project}
                        deletecallback={callback}
                    />
                );
            })}
        </div>
    );
};

export default ProjectList;
