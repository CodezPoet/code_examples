namespace c_course_cont.section2.examples.example1;

public class TestEmployee
{
    public static void MainExample()
    {
        Employee alex = new Employee();
        Employee lynda = new Employee();

        alex.salary = 90000;
        alex.bonus = 20000;
        alex.CalculateTotalPay();

        lynda.salary = 100000;
        lynda.bonus = 20000;
        lynda.CalculateTotalPay();
    }
}