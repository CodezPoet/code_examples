namespace c_course_1.section1.examples;

public class ExampleAndOr
{
    public static void MainExample()
    {
        int x = -10;
        int y = 10;

        // & checks on both sides, && if the first value matches one side, doesn't check the second on the other side
        if (x >= 0 && y >= 0)
        {
            Console.WriteLine("Both numbers are positive");
        }
        // | checks on both sides, || if the first value matches on the one side, doesn't check the second on the other side
        else if (x >= 0 || y >= 0)
        {
            Console.WriteLine("At least one number is positive");
        }
        else
        {
            Console.WriteLine("Both numbers are negative");
        }
    }
}