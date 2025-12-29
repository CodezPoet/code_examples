namespace c_course_cont.section1.examples;

public class ExampleDoWhile
{
    public static void MainExample()
    {
        int x = 10;

        do
        {
            Console.WriteLine("x = " + x);
            x--;
        } while (x > 0);
    }
}