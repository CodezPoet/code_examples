namespace c_course_cont.section1.examples;

public class ExampleFor
{
    public static void MainExample()
    {
        /*
         * i++ is short form for i = i +1
         * for (initial value, condition, incrementor/ decrementor)
         */
        for (int i = 20; i >= 10; i--)
        {
            Console.WriteLine("i = " + i);
        }
    }
}