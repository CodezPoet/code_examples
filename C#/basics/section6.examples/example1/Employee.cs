namespace c_course_cont.section6.examples.example1;

// Delegates example
public class Employee
{
    public string EmpName { get; set; }
    public decimal Salary { get; set; }
    public decimal Bonus { get; set; }
    public decimal TotalPay { get; set; }

    public void CalculateTotalPay()
    {
        TotalPay = Salary * Bonus;
        Console.WriteLine("Total Pay: " + TotalPay);
    }
}