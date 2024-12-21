using c_course_cont.section6.examples.example1;

namespace c_course_cont.section6.examples.example3;

public class LambdaEx
{
    // public delegate int Calculate(int x, int y);
    // public delegate int Operate(int x);
    // public delegate string GetName(Employee obj);
    // public delegate string NoPrams();
    public delegate void PrintSomething(string x);

    public static void MainExample()
    {
        // Operate op = (x) => x * 2; 
        // In a func, the last parameter is always the return type. 
        Func<int, int> op = (x) => x * 2;
        Console.WriteLine(op(4));

        // Calculate calc = (x, y) => x * y;
        // Takes in 2 integers (see Calculate above, and returns 1 integers, so it is int, int, int (2 and 1)
        Func<int, int, int> calc = (x, y) => x * y;
        Console.WriteLine(calc(4, 5));

        // GetName name = (x) => x.EmpName;
        Func<Employee, string> name = (x) => x.EmpName;
        Employee alex = new Employee { EmpName = "Alex Rod", Salary = 100000 };
        Console.WriteLine(name(alex));

        // NoPrams prams = () => "Hello World";
        // If no parameters, can just use the return type
        Func<string> prams = () => "Hello World";
        Console.WriteLine(prams());

        calc = (x, y) =>
        {
            Console.WriteLine("MultiLine");
            return x + y;
        };

        Console.WriteLine(calc(10, 20));

        // If no return present like void return type than cannot use func, need to use Action
        // Action does not have return type, it only has passing parameters
        Action<string> act = (x) => { Console.WriteLine("Hello " + x); };
        act("Alex");

        // Predicate always returns boolean value
        // A lot of people don't use Predicate, but Func with boolean return type instead
        Predicate<int> p = (x) => x > 0;
        Console.WriteLine(p(20));
    }
}