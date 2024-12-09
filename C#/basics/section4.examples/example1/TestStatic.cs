namespace c_course_cont.section4.examples.example1;

public class TestStatic
{
    public static void MainExample()
    {
        ExampleStatic obj1 = new ExampleStatic();
        ExampleStatic obj2 = new ExampleStatic();
        
        Console.WriteLine("..................");

        ExampleStatic.staticCount = 1;
        obj1.nonStaticCount = 1;
        obj2.nonStaticCount = 1;
        
        obj1.CallStaticCount();
        obj2.CallStaticCount();
        obj2.CallStaticCount();
        
        Console.WriteLine("..................");
        
        obj1.CallNonStaticCount();
        obj2.CallNonStaticCount();
        obj2.CallNonStaticCount();
    }
}