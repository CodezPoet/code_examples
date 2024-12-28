using System.ComponentModel;
using System.Numerics;

namespace c_course_cont.section10.examples.example1;

// Attributes can simplify programming sometimes. 
// e.g  [NonNegative] to only allow nonnegative numbers
public class Employee
{
    [NonNegative] public int EmpId { get; set; }

    // Just by using get and set, it will generate the getter and setter Methods, when running the Reflection
    // e.g.     public string EmpName { get; set; }
    [Description("This is the employee name")] // Attribute
    public string EmpName;

    [NonNegative] public decimal Salary;

    [NonNegative] [ValueRange(minValue: 10000, maxValue: 50000)]
    public decimal Bonus;

    [NonNegative] public decimal TotalPay;

    public Employee()
    {
        Console.WriteLine("No Args Constructor");
    }

    public Employee(string empName, decimal salary, decimal bonus)
    {
        this.EmpName = empName;
        this.Salary = salary;
        this.Bonus = bonus;
    }

    public void CalculateBonus(decimal percentage)
    {
        Bonus = Bonus * percentage;
    }

    public void CalculateTotalPay()
    {
        TotalPay = Salary + Bonus;
    }
}