namespace SolidPrinciples.InterfaceSegregationPrincipleISP.InterfaceBaseClass
{
    public interface IEmployeeRewards
    {
        double CalculateReward(Employee emp);
    }

    public interface IEmployeeFinances : IEmployeeRewards
    {
        double CalculatePay(Employee emp);
    }

     public class EmployeeRewards : IEmployeeRewards
    {

        public virtual double CalculateReward(Employee emp)
        {
            return 100;
        }
    }

    public class EmployeeFinances : IEmployeeFinances
    {
        public virtual double CalculatePay(Employee emp)
        {
            return 10;
        }

        public virtual double CalculateReward(Employee emp)
        {
            return 100;
        }
    }

    public class EmployeeFinancesForFTE : EmployeeFinances
    {
        public override double CalculatePay(Employee emp)
        {
            return emp.TotalHoursWorked * 10;
        }

        public override double CalculateReward(Employee emp)
        {
            return 200;
        }
    }

    public class EmmployeeFinancesForPTE : EmployeeFinances
    {

        public override double CalculatePay(Employee emp)
        {
            return emp.TotalHoursWorked * 10;
        }

        public override double CalculateReward(Employee emp)
        {
            return 150;
        }
    }

    public class EmmployeeFinancesForContractor : EmployeeRewards
    {
        public override double CalculateReward(Employee emp)
        {
            return 120;
        }
    }

}

