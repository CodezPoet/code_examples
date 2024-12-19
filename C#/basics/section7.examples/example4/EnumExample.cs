namespace c_course_cont.section7.examples.example4;

public class EnumExample
{
    public enum Days
    {
        Sat,
        Sun,
        Mon,
        Tue,
        Wed,
        Thu,
        Fri
    };

    public static void MainExample()
    {
        Days day = Days.Tue;
        Console.WriteLine(day + " " + (int)day);
    }
}