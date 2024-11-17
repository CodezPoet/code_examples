namespace c_course_1.section2.examples.example4;

public class Employee
{
    private double salary;
    public double bonus { private set; get; }

    // public double GetBonus()
    // {
    //     return bonus;
    // }
    
    public void SetSalary(double salary)
    {
        if (salary < 40000  || salary > 150000)
        {
            Console.WriteLine("Please check salary");
            this.salary = 0;
            this.bonus = 0;
        }
        else
        {
            this.salary = salary;
            this.bonus = salary * .20;
        }
    }
    public void CalculateTotalPay()
    {
        double totalPay = salary + bonus;
        Console.WriteLine("Total Pay: " + totalPay);
    }
}