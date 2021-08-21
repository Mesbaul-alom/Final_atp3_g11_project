import Bidder from "./Bidder";

const BidderList = ({ bidders }) => {
    return (
        <div>
            {bidders.map((bidder) => {
                return (
                    <Bidder
                        // key={bidder.id}
                        {...bidder}
                        // deletecallback={callback}
                    />
                );
            })}
        </div>
    );
};

export default BidderList;