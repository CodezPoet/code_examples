namespace c_course_cont.section7.examples.example5;

public class RefOutDemo
{
    public static void MainExample()
    {
        RefOutExample obj = new RefOutExample();
        int i = 10;

        // result: i = 10;
        Console.WriteLine(" i = " + i);
        
        // Pass by value. Simply passing the value
        // So after this, when you call i again, it will still be 10
        // (ur not calling the output from the method ( a = a * a), but what i is after running the method
        obj.SomeMethodA(i);
        // result: i = 10
        Console.WriteLine(" i = " + i);

        // With ref i, it is not actually the value of i being passed.
        // It is not the example value 10 that is being passed.
        // It is the memory location of i that is being passed,
        // wherever i exists that particular location is passed
        // so if i = 10, it will become 100 in this case
        // so, you are not actually passing the value from i to a, but
        // you are actually passing the memory location
        obj.SomeMethodB(ref i);
        // result i = 100
        Console.WriteLine(" i = " + i);

        Console.WriteLine("-------------------------------");

        double f;
        i = obj.GetParts(10.125, out f);
        Console.WriteLine("f = " + f);
     
    }
}