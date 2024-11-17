namespace c_course_1.section2.examples.example1;

public class Employee
{
    public double salary;
    public double bonus;

    public void CalculateTotalPay()
    {
        double totalPay = salary + bonus;
        Console.WriteLine("Total Pay: " + totalPay);
    }
}