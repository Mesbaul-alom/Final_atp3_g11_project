import PostContest from "./PostContest";
import { Link } from "react-router-dom";
const PostContestList = ({ contests, callback }) => {
    return (
        <div>
        <div>
            {/* <Link to={'/postContest'} className="btn btn-primary btn-sm">Post Contest</Link> */}
        </div>
            {contests.map((contest) => {
                return (
                    <PostContest
                        key={contest.id}
                        {...contest}
                        deletecallback={callback}
                    />
                );
            })}
        </div>
    );
};

export default PostContestList;
