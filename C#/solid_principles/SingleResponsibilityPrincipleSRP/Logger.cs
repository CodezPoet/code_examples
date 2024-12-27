namespace SolidPrinciples.SingleResponsibilityPrincipleSRP
{
    public class Logger
    {
        public void LogError(string message)
        {
            System.IO.File.WriteAllText("/path/to/log.txt", message);
        }
    }
}