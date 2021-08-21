import { Link } from "react-router-dom";
import Bid from "./Bid";

const BidListDetails = ({ bid }) => {
    return (
        <div>
        
                return (
                    <Bid
                        key={bid.id}
                        {...bid}
                    />
                );
         
            {/* <Link to={'/contestList'} className="btn btn-warning">Entry</Link> */}
        </div>
    );
};

export default BidListDetails;
