import { useEffect } from "react";

export const useFetch = (url,contest,Bid,Bidder) => {
    const getData = async () => {
        //ContestList Part
        const responsecon = await fetch(url + "contestList");
        const contest_data = await responsecon.json();
        contest(contest_data);
        //BidList part
        const responsebid = await fetch(url + "bidList");
        const bid_data = await responsebid.json();
        Bid(bid_data);

        //PorjectList Part 
        // const responsepro = await fetch(url + "projectList");
        // const project_data = await responsepro.json();
        // project(project_data); 

        
        //BidderList part
        const responsebidder = await fetch(url + "seller_bidingproject");
        const bidder_data = await responsebidder.json();
        Bidder(bidder_data);
        
        
    };

    useEffect(() => {
        getData();
    }, []);
};


/*Contest part*/
export const createPostContest = (url, data) => {
    fetch(url + "postContest", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log("Success:", data);
        })
        .catch((error) => {
            console.error("Error:", error);
        });
};


export const EditContest = (url, id, callback) => {
    const getData = async () => {
        const response = await fetch(url + "editContest/" + id);
        const data = await response.json();
        callback(data);
    };

    useEffect(() => {
        getData();
    }, []);
};

export const updateContest = (url, data) => {
    fetch(url + "editContest/" + data.id, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log("Success:", data);
        })
        .catch((error) => {
            console.error("Error:", error);
        });
};



export const deleteContest = (url, id) => {
    fetch(url + "deleteContest/" + id, {
        method: "get",
    })
        .then(() => {
            console.log("removed");
        })
        .catch((err) => {
            console.error(err);
        });
};
/*Contest part*/


/*Project Part*/
// export const createProject = (url, data) => {
//     fetch(url + "postProject", {
//         method: "POST",
//         headers: {
//             "Content-Type": "application/json",
//         },
//         body: JSON.stringify(data),
//     })
//         .then((response) => response.json())
//         .then((data) => {
//             console.log("Success:", data);
//         })
//         .catch((error) => {
//             console.error("Error:", error);
//         });
// };


// export const deleteProject = (url, id) => {
//     fetch(url + "deleteProject/" + id, {
//         method: "get",
//     })
//         .then(() => {
//             console.log("removed");
//         })
//         .catch((err) => {
//             console.error(err);
//         });
// };
/*Project Part*/



/*Bidlist Part */

export const DetailsBid = (url, id, Bid) => {
    const getData = async () => {
        const response = await fetch(url + "bidList_details/" + id);
        const data = await response.json();
        Bid(data);
    };

    useEffect(() => {
        getData();
    }, []);
};


/*Bidlist Part */

/*Bidder*/
// export const Bidder = (url, id, Bidd) => {
//     const getData = async () => {
//         const response = await fetch(url + "/bidlist/seller_bidingproject/" + id);
//         const data = await response.json();
//         Bidd(data);
//     };

//     useEffect(() => {
//         getData();
//     }, []);
// };

/*Bidder*/





// export const EditEmployee = (url, id, callback) => {
//     const getData = async () => {
//         const response = await fetch(url + "editEmployee/" + id);
//         const data = await response.json();
//         callback(data);
//     };

//     useEffect(() => {
//         getData();
//     }, []);
// };

// export const updateEmployee = (url, data) => {
//     fetch(url + "editEmployee/" + data.id, {
//         method: "POST",
//         headers: {
//             "Content-Type": "application/json",
//         },
//         body: JSON.stringify(data),
//     })
//         .then((response) => response.json())
//         .then((data) => {
//             console.log("Success:", data);
//         })
//         .catch((error) => {
//             console.error("Error:", error);
//         });
// };


// export const deleteEmployee = (url, id) => {
//     fetch(url + "deleteEmployee/" + id, {
//         method: "get",
//     })
//         .then(() => {
//             console.log("removed");
//         })
//         .catch((err) => {
//             console.error(err);
//         });
// };







// export const createJob = (url, data) => {
//     fetch(url + "createJob", {
//         method: "POST",
//         headers: {
//             "Content-Type": "application/json",
//         },
//         body: JSON.stringify(data),
//     })
//         .then((response) => response.json())
//         .then((data) => {
//             console.log("Success:", data);
//         })
//         .catch((error) => {
//             console.error("Error:", error);
//         });
// };


// export const deleteJob = (url, id) => {
//     fetch(url + "deleteJob/" + id, {
//         method: "get",
//     })
//         .then(() => {
//             console.log("removed");
//         })
//         .catch((err) => {
//             console.error(err);
//         });
// };



// export const EditJob = (url, id, callback) => {
//     const getData = async () => {
//         const response = await fetch(url + "editJob/" + id);
//         const data = await response.json();
//         callback(data);
//     };

//     useEffect(() => {
//         getData();
//     }, []);
// };

// export const updateJob = (url, data) => {
//     fetch(url + "editJob/" + data.id, {
//         method: "POST",
//         headers: {
//             "Content-Type": "application/json",
//         },
//         body: JSON.stringify(data),
//     })
//         .then((response) => response.json())
//         .then((data) => {
//             console.log("Success:", data);
//         })
//         .catch((error) => {
//             console.error("Error:", error);
//         });
// };

// export const login = (url, data) => {
//     fetch(url + "login", {
//         method: "POST",
//         headers: {
//             "Content-Type": "application/json",
//         },
//         body: JSON.stringify(data),
//     })
//         .then((response) => response.json())
//         .then((data) => {
//             console.log("Success:", data);
//         })
//         .catch((error) => {
//             console.error("Error:", error);
//         });
// };