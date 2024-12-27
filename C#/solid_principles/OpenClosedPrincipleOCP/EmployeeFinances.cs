namespace SolidPrinciples.OpenClosedPrincipleOCP
{
    public class EmployeeFinances
    {
        public virtual double CalculatePay(Employee emp)
        {
            return 10;
        }
    }

    public class EmployeeFinancesForFTE : EmployeeFinances
    {
        public override double CalculatePay(Employee emp)
        {
            return emp.TotalHoursWorked * 10;
        }
    }

    public class EmmployeFinancesForPTE : EmployeeFinances
    {

        public override double CalculatePay(Employee emp)
        {
            return emp.TotalHoursWorked * 10;
        }
    }

    public class EmmployeFinancesForContractor : EmployeeFinances
    {

        public override double CalculatePay(Employee emp)
        {
       return emp.TotalHoursWorked * 2;
        }
    }
}
