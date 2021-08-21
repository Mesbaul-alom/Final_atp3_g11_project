import Bid from "./Bid";

const BidList = ({ bids,id }) => {
    return (
        <div>
            {bids.map((bid) => {
                return (
                    <Bid
                        key={bid.id}
                        {...bid}
                        // deletecallback={callback}
                    />
                );
            })}
        </div>
    );
};

export default BidList;
