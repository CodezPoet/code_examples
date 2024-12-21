namespace c_course_cont.section1.excercises;

/*
 * Review question 2:
 * Given an array of string
 * string[] strs = {"3.45", "3.87", "87.98", "56.7"};
 *
 * Compute the sum of these numbers
 */
public class ExcerciseB
{
    public static void MainExample()
    {
        string[] strs = { "3.45", "3.87", "87.98", "56.7" };

        double total = 0.0;

        foreach (string temp in strs)
        {
            total = total + Convert.ToDouble(temp);
        }

        Console.WriteLine("Total = " + total);
    }
}