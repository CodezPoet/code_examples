namespace c_course_cont.section6.examples.example1;

public class TestEmployee
{
    public static void MainExample(string[] args)
    {
        Employee alex = new Employee();
        
        alex.EmpName = "Alex Rod";
        alex.Salary = 100000000;
        alex.Bonus = 200000;
        alex.CalculateTotalPay();
         
    }
}
