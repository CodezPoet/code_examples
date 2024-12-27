namespace SolidPrinciples.SingleResponsibilityPrincipleSRP
{
    public class Employee
    {
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
    }
}