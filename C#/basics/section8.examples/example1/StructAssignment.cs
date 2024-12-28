namespace c_course_cont.section8.examples.example1;

// Structures cannot inherit from a Class or another struct.
// Structures can implement interfaces
// Structures cannot have a no-argument constructor. 
// They can have constructors that take arguments, but all instance
// variables must be assigned before end of constructor
struct MyStruct
{
    public int x;
}

public class StructAssignment
{
    public static void MainExample()
    {
        MyStruct a;
        MyStruct b;
        a.x = 10;
        b.x = 20;
        Console.WriteLine("a.x {0}, b.x {1}", a.x, b.x);
        // When you assign one structure to another,
        // a copy of the object is made
        a = b; // a and b refer to different object
        // if b changes, it doesn't affect a.
        b.x = 30;
        Console.WriteLine("a.x {0}, b.x {1}", a.x, b.x);
    }
}