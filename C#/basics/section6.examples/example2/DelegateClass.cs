namespace c_course_cont.section6.examples.example2;

// A delegate is a pointer to a method
// A delegate can point to any method that the same signature (type like int or string, or double, but must point to the same type)
public delegate int Calculate(int a, int b);

public class DelegateClass
{
    public static int Add(int x, int y)
    {
        Console.WriteLine("Inside Add");
        return x + y;
    }

    public static int Subtract(int x, int y)
    {
        Console.WriteLine("Inside Subtract");
        return x - y;
    }

    public int Divide(int x, int y)
    {
        Console.WriteLine("Inside Divide");
        return x / y;
    }

    public decimal MethodA(int a, int b, Calculate z)
    {
       return z(a, b);
    }
}