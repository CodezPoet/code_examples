namespace c_course_cont.section11.examples.example1;

public interface ILogger
{
    void Info(string message);
}

// Textlogger implementation for Ilogger
public class TextLogger : ILogger
{
    public void Info(string message)
    {
        Console.WriteLine("Text Logger : " + message);
    }
}