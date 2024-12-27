namespace SolidPrinciples.LiskovSubstitutionPrincipleLSP
{
    public class EmployeeRewards
    {

        public virtual double CalculateReward(Employee emp)
        {
            return 100;
        }
    }

    public class EmployeeFinances : EmployeeRewards
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

