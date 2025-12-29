namespace c_course_cont.section8.examples.example3;

public class TestGenCalculate
{
    public static void MainExample()
    {
        GenCalculate<int, string> obj = new GenCalculate<int, string>(10, "test");
        obj.Printout();
    }
}