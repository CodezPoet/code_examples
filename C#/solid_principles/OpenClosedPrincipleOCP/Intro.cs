namespace SolidPrinciples.OpenClosedPrincipleOCP
{
    class Intro
    {
        public static void MainExample()
        {
            Employee empFTE = new Employee() { EmployeeType = Employee.empType.FullTime.ToString(), TotalHoursWorked = 10 };
            Employee empPTE = new Employee() { EmployeeType = Employee.empType.PartTime.ToString(), TotalHoursWorked = 10 };
            Employee empContractor = new Employee() { EmployeeType = Employee.empType.Contractor.ToString(), TotalHoursWorked = 10 };

            EmployeeFinances employeeFinances = new EmmployeFinancesForContractor();
            var totalPay = employeeFinances.CalculatePay(empContractor);
            Console.WriteLine(totalPay);
            Console.Read();
        }
    }
}