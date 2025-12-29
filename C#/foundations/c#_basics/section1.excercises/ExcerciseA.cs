namespace c_course_cont.section1.excercises;

/*
 * Review question: Calculate the tax to be
 * paid by a person earning $45000
 */
public class ExcerciseA
{
    public static void MainExample()
    {
        Console.WriteLine("Please enter salary");

        string? input = Console.ReadLine();

        double salary = Convert.ToDouble(input);
        double tax;

        if (salary <= 8350)
        {
            tax = 8350 * .10;
        }
        else if (salary <= 33950)
        {
            tax = (8350 * .10) + ((salary - 8350) * .15);
        }
        else
        {
            tax = (8350 * .10) + ((33950 - 8350) * .15) + ((salary - 33950) * .25);
        }

        Console.WriteLine("Tax = " + tax);
    }
}