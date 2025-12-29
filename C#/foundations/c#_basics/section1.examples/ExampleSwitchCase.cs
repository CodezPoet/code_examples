namespace c_course_cont.section1.examples;

public class ExampleSwitchCase
{
    public static void MainExample()
    {
        string j = "Two";

        switch (j)
        {
            case "Zero":
                Console.WriteLine(" value is 0");
                break;
            case "One":
                Console.WriteLine(" value is 1");
                break;
            case "Two":
                Console.WriteLine(" value is 2");
                break;
            case "Three":
                Console.WriteLine(" value is 3");
                break;
            case "Four":
                Console.WriteLine(" value is 4");
                break;
            default:
                Console.WriteLine(" value not found");
                break;
        }
    }
}