namespace c_course_cont.section1.excercises;

/*
 * Review question 3:
 *
 * For a given string:
 * a = "Hello World"
 * print out "world
 */
public class ExcerciseC
{
    public static void MainExample()
    {
        string a = "Hello World";

        Console.WriteLine(a.Substring(6, 5).ToLower());
    }
}