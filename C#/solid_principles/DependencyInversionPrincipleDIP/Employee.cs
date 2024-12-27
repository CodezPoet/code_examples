using Unity;

namespace SolidPrinciples.DependencyInversionPrincipleDIP
{
    public class Employee
    {
        public string EmployeeType { get; set; }
        public double TotalHoursWorked { get; set; }

        [Dependency]
        public ILogger logger { get; set; }

        public void Save(Employee emp)
        {
            try
            {
                // code for saving
                throw new Exception();
            }
            catch (Exception ex)
            {
                logger.LogError(ex.Message);
            }
        }

        public enum empType
        {
            FullTime,
            PartTime,
            Contractor
        }
    }
}