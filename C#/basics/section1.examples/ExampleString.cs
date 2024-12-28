namespace c_course_cont.section1.examples;

public class ExampleString
{
    public static void MainExample()
    {
        // manipulate text
        string x = "David Beckham";
        Console.WriteLine("Hello " + x);
        Console.WriteLine(x.ToUpper());
        Console.WriteLine(x.Substring(0, 2)); // vid Beckham
        Console.WriteLine(x.Substring(4, 5)); // d Bec
        Console.WriteLine(x.IndexOf("v")); // 2
        Console.WriteLine(x[1]); //a

        Console.WriteLine("-------------------");

        string[] y = { "one", "two", "three" };
        foreach (string z in y)
        {
            Console.WriteLine(z);
        }

        Console.WriteLine("-------------------");

        string age = "34";
        string sal = "97456.71";

        int g = Convert.ToInt32(age);
        Console.WriteLine(g / 2);

        Console.WriteLine(Convert.ToDouble(sal) * .02);
    }
}