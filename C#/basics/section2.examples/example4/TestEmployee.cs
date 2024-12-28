namespace c_course_cont.section2.examples.example4;

public class TestEmployee
{
    public static void MainExample()
    {
        Employee alex = new Employee();
        Employee lynda = new Employee();

        alex.SetSalary(100000);
        alex.CalculateTotalPay();
        Console.WriteLine("Bonus = " + alex.bonus);

        lynda.SetSalary(100000);
        lynda.CalculateTotalPay();
    }
}