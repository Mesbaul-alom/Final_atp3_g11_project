import { Link } from "react-router-dom";

const Navbar = () => {
    return (
        <div>

           
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
               <Link class="nav-link" to="/contestList">Contest List</Link>      
                   </li>
                    <li class="nav-item">
                    <Link class="nav-link" to="/bidList">Bid List</Link>
                    </li>
                    <li class="nav-item">
                    <Link class="nav-link" to="/projectList">Project List</Link>
                    </li>
                    <li class="nav-item">
                    <Link class="nav-link" to="/blogList">Blog List</Link>
                    </li>
                    <li class="nav-item">
                    <Link class="nav-link" to="/postProject">Post Project</Link>   
                    </li>
                    <li class="nav-item">
                    <Link class="nav-link" to="/postContest">Post Contest</Link> 
                    </li>
                    <li class="nav-item">
                    <Link class="nav-link" to="/addBlog">Create Blog</Link> 
                    </li>
                    <li class="nav-item">
                    <Link class="nav-link" to="/seller_bidingproject">Bidder List</Link> 
                    </li>
                    <li class="nav-item">
                    <Link class="nav-link btn btn-primary" to="/login">Login</Link> 
                    </li>
                    <li class="nav-item">
                    <Link class="nav-link btn btn-primary" to="/">Registration</Link> 
                    </li>
                </ul>
                </div>
            </div>
</nav>

          
        </div>
    );
};

export default Navbar;
