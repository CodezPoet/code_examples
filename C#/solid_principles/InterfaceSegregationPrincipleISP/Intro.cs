using SolidPrinciples.InterfaceSegregationPrincipleISP.InterfaceChildClass;

namespace SolidPrinciples.InterfaceSegregationPrincipleISP
{
    public class Intro
    {
        public static void MainExample()
        {
            Employee empFTE = new Employee() { EmployeeType = Employee.empType.FullTime.ToString(), TotalHoursWorked = 10 };
            Employee empPTE = new Employee() { EmployeeType = Employee.empType.PartTime.ToString(), TotalHoursWorked = 10 };
            Employee empContractor = new Employee() { EmployeeType = Employee.empType.Contractor.ToString(), TotalHoursWorked = 10 };

            IEmployeeFinances employeeFinances = new EmmployeeFinancesForPTE();
            var totalPay = employeeFinances.CalculatePay(empPTE);
            var totalRewards = employeeFinances.CalculateReward(empPTE);
            Console.WriteLine("totalPay {0}", totalPay);
            Console.WriteLine("totalRewards {0}", totalRewards);
            Console.Read();
        }
    }

}
