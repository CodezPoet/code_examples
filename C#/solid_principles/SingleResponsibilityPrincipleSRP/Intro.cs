namespace SolidPrinciples.SingleResponsibilityPrincipleSRP
{
    public class EmployeeIntro
    {
        public double CalculatePay(Employee emp)
        {

        }

        public void Save(Employee emp)
        {
            try
            {
                // code for saving
            }
            catch (Exception ex)
            {
                Logger logger = new Logger();
                logger.LogError(ex.Message);
            }
        }

        public string ReportHours(Employee emp)
        {

        }
    }
}