namespace c_course_cont.section4.examples.exampleproject;

public class XYZCompany
{
    public static void MainExample()
    {
        Employee alex = new Employee("Alex Rod", 6);
        Employee lynda = new Employee("Lynda Berry", 7);
        Employee john = new Employee("John Doe", 3);
        Employee sara = new Employee("Sara Time", 7);
        Employee james = new Employee("James Doe", 4);

        Department sales = new Department("XYZ Sales");
        sales.AddEmployee(alex);
        sales.AddEmployee(lynda);
        sales.AddEmployee(john);
        sales.Describe();

        Console.WriteLine("----------------------");

        Department IT = new Department("XYZ IT");
        IT.AddEmployee(sara);
        IT.AddEmployee(james);
        IT.Describe();
    }
}