import React, { useState } from "react";
import { useHistory } from "react-router-dom";

const Login = ({ callback }) => {
    const history = useHistory();

    const [login, setLogin] = useState(false);
    const [user, setUser] = useState({
        user_name: "",
        password: "",
    });

    const change = (e) => {
        const attr = e.target.name;
        const val = e.target.value;
        setUser({ ...user, [attr]: val });
    };

    const onSubmit = (e) => {
        e.preventDefault();
        callback(user);
        setLogin(true);
        history.push("/");
    };

    return login ? (
        <div></div>
    ) : (
        <div>
            <form onSubmit={onSubmit}>
                <table>
                    <tr>
                        <td>User Name</td>
                        <td>
                            <input
                                type="text"
                                name="user_name"
                                value={user.user_name}
                                onChange={change}
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input
                                type="password"
                                name="password"
                                value={user.password}
                                onChange={change}
                            />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="login" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    );
};

export default Login;