namespace c_course_cont.section10.examples.example1;

public class TestValidator
{
    public static void MainExample()
    {
        Employee empObj = new Employee("Alex", 200, 1000);
        Validator.Validate(empObj);
        ValueValidator.Validate(empObj);
    }
}