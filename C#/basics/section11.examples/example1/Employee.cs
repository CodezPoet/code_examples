namespace c_course_cont.section11.examples.example1;

public class Employee
{
    public string EmpName { get; set; }

    public ILogger log { get; set; }

    public Employee(ILogger _log)
    {
        this.log = _log;
    }

    public void CalculateSomething()
    {
        // code to calculate something
        log.Info("Logs employee calculations");
    }
}