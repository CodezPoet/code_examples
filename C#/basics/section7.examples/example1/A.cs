namespace c_course_cont.section7.examples.example1;

// The sealed word is used for classes and methods
// The const and readonly are used for data

public class A
{
    public const double pi = 3.14;
    // * Can´t be static
    // * Value is evaluated at compile time
    // * Initialized at declaration only
    // Must declare value this way, in this case (3.14)

    public readonly double theNum = 1.618;

    // or like below: because readonly you don't have to declare the value now (1.618 in this case), can be in the constructor too. 
    // However, once it is assigned cannot redeclare new value, or can declare like above as constant.
    public readonly double theNum2;
    // * Can be either instance-lever or static
    // * Value is evaluated at run time. 
    // * Can be inherited in declaration or by code in the constructor

    public virtual void methodA()
    {
        Console.WriteLine("pi value" + Math.PI);
        // The Math method is build in C#, it has o.a. PI as a constant and 
        // the .NET framework will not allow you to assign any other value to it
    }
}