namespace SolidPrinciples.DependencyInversionPrincipleDIP
{
    public interface ILogger
    {
        void LogError(string message);
    }

    public class FileLogger : ILogger
    {
        public void LogError(string message)
        {
            // System.IO.File.WriteAllText("/path/to/log.txt", message);
            Console.WriteLine("Logging into the file");
        }
    }

    public class DatabaseLogger: ILogger
    {
        public void LogError(string message)
        {
            Console.WriteLine("Logging into the database");
        }
    }
}