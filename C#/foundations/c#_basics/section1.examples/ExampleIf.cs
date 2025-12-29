namespace c_course_cont.section1.examples;

public class ExampleIf
{
    public static void MainExample()
    {
        Console.WriteLine("\nExampleIf");
        int x = 10;
        int y = 20;

        if (x < y)
        {
            Console.WriteLine("x is less than y");
        }
        else if (x > y)
        {
            Console.WriteLine("x is greater than y");
        }
        else
        {
            Console.WriteLine("x is equal to y");
        }
    }
}