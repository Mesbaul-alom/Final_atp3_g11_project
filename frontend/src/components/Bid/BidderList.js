import Bidder from "./Bidder";



const BidderList = ({ bidders }) => {
    return (
        <div>
            <h1 style={{textAlign:"center"}}> Seller Who bid these project</h1>
            {bidders.map((bidder) => {
                return (
                    <Bidder
                        key={bidder.id}
                        {...bidder}
                        // deletecallback={callback}
                    />
                );
            })}
        </div>
    );
};

export default BidderList;