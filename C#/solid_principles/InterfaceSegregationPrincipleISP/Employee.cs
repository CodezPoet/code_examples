namespace SolidPrinciples.InterfaceSegregationPrincipleISP
{
    public class Employee
    {
        public string EmployeeType { get; set; }
        public double TotalHoursWorked { get; set; }

        public void Save(Employee emp)
        {

        }

        public enum empType
        {
            FullTime,
            PartTime,
            Contractor
        }
    }
}