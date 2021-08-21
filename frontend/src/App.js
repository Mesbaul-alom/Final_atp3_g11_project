import  React from "react";
import { BrowserRouter as Router, Route, Switch } from "react-router-dom";
import addManager from './components/admin/addManager';
import Home from './components/admin/home';
import Managerlist from './components/admin/managerlist';
import Editmanager from './components/admin/Editmanager';
import Profile from './components/admin/profile';
import Projectlist from './components/admin/projectlist';
import Editproject from './components/admin/Editproject';

import "./App.css";

import AddPostContest from "./components/Contest/AddPostContest";
import PostContestList from "./components/Contest/PostContestList";
import EditPostContest from "./components/EditPostContest";
import { contests } from "./ContestList";

import BidList from "./components/Bid/BidList";
import { bids } from "./BidList";

import AddProject from "./components/Project/AddProject";
import Project from "./components/Project/Project";
import EditProject from "./components/Project/EditProject";

import { projects } from "./ProjectList";

import BidderList from "./components/Bid/BidderList";
import { bidders } from "./BidderList";

import MessageSeller from "./components/MessageSeller";

import AddBLog from "./components/Blog/AddBlog";
import BlogList from "./components/Blog/BlogList";
import EditBlog from "./components/Blog/EditBlog";

import Register from "./components/Login/Register";
import { BrowserRouter as Router, Route, Switch } from "react-router-dom";
import {
    useFetch,
    createPostContest,
    deleteContest,
    updateContest,
    DetailsBid,
    //createProject,
    // deleteProject,
    // Bidder ,
} from "./components/useFetch";
import Navbar from "./components/Navbar";
// import {BidListDetails} from "./components/BidListDetails";

import "../node_modules/bootstrap/dist/css/bootstrap.min.css";
import"../node_modules/bootstrap/dist/js/bootstrap.bundle";


function App() {
   
const [contest, setContest] = useState(contests);
    const [project, setProject] = useState(projects);
    const [bid, setBid] = useState(bids);  
    const[bidder,setBidder] = useState(bidders);

    const url = "http://localhost:8000/api/";
    useFetch(url, setContest,setProject,setBid,setBidder);
    
    /*Contest Part*/
    const addPostContest = (newContest) => {
        createPostContest(url, newContest);
        setContest([...contest, newContest]);
    };
    const deleteCon = (id) => {
        deleteContest(url, id);
        const data = contest.filter((user) => user.id !== id);
        setContest(data);
    };

    const editContest = (newCon) => {
        updateContest(url, newCon);
        const data = contest.filter((user) => user.id != newCon.id);
        setContest([...data, newCon]);
    };
    return (
        <Router>
           
            <Switch>
             <Route exact path="/" component={Home}/>
             <Route exact path="/addManager" component={addManager}/>
             <Route exact path="/managerlist" component={Managerlist}/>
             <Route exact path="/edit-manager/:id" component={Editmanager}/>
             <Route exact path="/edit-project/:id" component={Editproject}/>
             <Route exact path="/profile" component={Profile}/>
             <Route exact path="/projectlist" component={Projectlist}/>
                    
                {/* <Route path="/contestList">
                    <Navbar />
                    <div>
                        <PostContestList contests={contest} callback={deleteCon} />
                    </div>
                </Route> */}
                <Route exact path="/">
                     <Navbar />
                    <h1>Welcome to online marketplace</h1>
                </Route> 
                <Route  path="/register">
                    
                    <Register />
                </Route>
                <Route path="/contestList">
                    <Navbar />
                    <div>
                        <PostContestList contests={contest} callback={deleteCon} />
                    </div>
                </Route>
                <Route path="/postContest">
                    <AddPostContest status="Post Contest" callback={addPostContest} />
                </Route>
                <Route path="/editContest/:id">
                    <EditPostContest status="edit contest" callback={editContest} />
                </Route>
                <Route path="/bidList">
                    <Navbar />
                        <div>
                            <BidList bids={bid} callback={deleteCon} />
                        </div>
                </Route>
                {/*Problem*/}
                {/* <Route path="/bidList_details/:id">
                    <Navbar/>
                         <DetailsBid bid={bid}/>   
                </Route> */}
                {/*Problem*/}
                <Route path="/seller_bidingproject" >
                    <div>
                          <BidderList bidders={bidder} />
                    </div>
                </Route>


                <Route path="/projectList">
                     <Navbar/> 
                     <Project />
                </Route> 
                <Route path="/postProject">
                    
                    <AddProject />
                </Route>
                <Route path="/editProject/:id" component={EditProject}> 
                </Route>

                 <Route path="/addBlog">
                     <Navbar/>
                     <AddBLog />
                 </Route>
                 <Route path="/blogList">
                     <Navbar />
                     <BlogList />
                 </Route>
                 <Route path="/editBlog/:id" component={EditBlog}> 
                </Route>
                
            </Switch>
        </Router>
    );
}
export default App;
