namespace c_course_cont.section11.examples.example1;

public class TestDependencyInjection
{
    public static void MainExample()
    {
        // setter injection
        // (this way has an issue, if anyone forget to write the code emp.log = new TextLogger()
        // then it is going to throw a runtime exception. To avoid this can use a constructor in the implemented Class
        Customer cust = new Customer();
        cust.log = new TextLogger();
        cust.PrintInvoice();

        // constructor injection
        Employee emp = new Employee(new TextLogger());
        emp.CalculateSomething();
    }
}