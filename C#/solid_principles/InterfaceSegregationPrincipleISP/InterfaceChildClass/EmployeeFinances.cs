namespace SolidPrinciples.InterfaceSegregationPrincipleISP.InterfaceChildClass
{
    public interface IEmployeeRewards
    {
        double CalculateReward(Employee emp);
    }

    public interface IEmployeeFinances : IEmployeeRewards
    {
          double CalculatePay(Employee emp);
    }

    public interface IStockOptions : IEmployeeFinances
    {
        double CalculateStockOptions(Employee emp);
    }

    public class EmployeeFinancesForFTE : IEmployeeFinances
    {
        public double CalculatePay(Employee emp)
        {
            return emp.TotalHoursWorked * 10;
        }

        public double CalculateReward(Employee emp)
        {
            return 200;
        }
    }

    public class EmmployeeFinancesForPTE : IEmployeeFinances
    {

        public double CalculatePay(Employee emp)
        {
            return emp.TotalHoursWorked * 10;
        }

        public double CalculateReward(Employee emp)
        {
            return 150;
        }
    }

    public class EmmployeeFinancesForContractor : IEmployeeRewards
    {
        public double CalculateReward(Employee emp)
        {
            return 120;
        }

    }

     public class EmmployeeFinancesForCLevel : IStockOptions
    {
        public double CalculatePay(Employee emp)
        {
            return 50;
        }

        public double CalculateReward(Employee emp)
        {
            return 50;
        }

        public double CalculateStockOptions(Employee emp)
        {
            return 50;
        }
    }
}

