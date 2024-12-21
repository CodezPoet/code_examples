namespace c_course_cont.section4.examples.example6;

public class VarExample
{
    public static void MainExample()
    {
        // an explicitly defined variable must always be initialized. The compiler uses the type of the initialized
        // to iniatalize the type
        var x = 10;
        //  x = "Hello";  gives error because different type than initialized
    }
}