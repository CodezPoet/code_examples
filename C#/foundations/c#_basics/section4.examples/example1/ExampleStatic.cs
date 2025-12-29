namespace c_course_cont.section4.examples.example1;

public class ExampleStatic
{
    public static int staticCount; 
    public int nonStaticCount;

    public void CallStaticCount()
    {
        Console.WriteLine("static count : " + staticCount);
        staticCount++;
    }

    public void CallNonStaticCount()
    {
        Console.WriteLine("none static count : " + nonStaticCount);
    }
    
    // a static constructor is fired before the instance constructor
    static ExampleStatic()
    {
        Console.WriteLine("Static constructor");
    }

    public ExampleStatic()
    {
        Console.WriteLine("Instance constructor");
    }
}