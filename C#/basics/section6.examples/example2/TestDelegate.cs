namespace c_course_cont.section6.examples.example2;

// The use of delegates is, that can now pass one method into another method using it
// that way also can control how a particular method acts
public class TestDelegate
{
    public static void MainExample()
    {


        int x = 10;
        Calculate calc = DelegateClass.Add;

        Console.WriteLine(calc(10, 20));
        
        Console.WriteLine("-------------------");

        x = 20;
        calc = DelegateClass.Subtract;
        Console.WriteLine(calc(10, 20));

        Console.WriteLine("-------------------");
        
        DelegateClass obj = new DelegateClass();
        calc = obj.Divide;
        Console.WriteLine(calc(20, 5));

        Console.WriteLine("-------------------");
        
        calc = DelegateClass.Subtract;
        Console.WriteLine(obj.MethodA(200, 5, calc));

        Console.WriteLine("-------------------");
        
        // Anonymous methods. Anonymous methods doesn't belong to any class en doesn't have a name.
        x = 30;
   
        // or Calculate calc 
        calc = delegate(int a, int b)
        {
            Console.WriteLine("Anonymous Method ");
            return a + b + 5;
        };
        Console.WriteLine(calc(20, 5));
        Console.WriteLine(obj.MethodA(200, 5 , calc));
        
        Console.WriteLine("-------------------");
    }
}