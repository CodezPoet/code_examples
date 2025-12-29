namespace c_course_cont.section4.examples.example5;

public class TeamB
{
    public static void MainExample()
    {
        TeamA obj = new TeamA();

        try
        {
            Console.WriteLine(obj.DivideNums(6, 2));
        }
        catch (Exception e)
        {
            Console.WriteLine("Message : " + e.Message);
        }
    }
}