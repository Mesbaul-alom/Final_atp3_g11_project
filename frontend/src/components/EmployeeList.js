import Employee from "./Employee";

const EmployeeList = ({ list, callback }) => {
    return (
        <div>
            {list.map((employee) => {
                return (
                    <Employee
                        key={employee.id}
                        {...employee}
                        deletecallback={callback}
                    />
                );
            })}
        </div>
    );
};

export default EmployeeList;
