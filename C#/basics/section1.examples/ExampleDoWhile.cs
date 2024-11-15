namespace c_course_1.section1.examples;

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