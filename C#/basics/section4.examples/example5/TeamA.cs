namespace c_course_cont.section4.examples.example5;

// Exception handling: throw an exception example
public class TeamA
{
    public int DivideNums(int a, int b)
    {
        int c = 0;
        try
        {
            c = a / b;
        }
        catch
        {
            throw new Exception("Please check your numbers");
        }

        return c;
    }
}