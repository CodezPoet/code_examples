namespace c_course_cont.section1.examples;

public class ExampleArray
{
    public static void MainExample()
    {
        int[] a = { 10, 20, 30, 40, 50, 60 };

        // Write array value
        Console.WriteLine(a[3]);
        a[4] = 55;
        Console.WriteLine(a[4]);

        Console.WriteLine("-------------------");

        // loop using for
        for (int i = 0; i < a.Length; i++)
        {
            Console.WriteLine("a[" + i + "] = " + a[i]);
        }

        Console.WriteLine("-------------------");

        // loop using foreach
        foreach (int tempvar in a)
        {
            Console.WriteLine(tempvar);
        }

        Console.WriteLine("-------------------");

        // initialize array and then assign values
        int[] x = new int[6];
        x[0] = 10;
        x[3] = 50;
        foreach (int z in x)
        {
            Console.WriteLine(z);
        }
    }
}