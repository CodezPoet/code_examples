namespace c_course_cont.section2.examples.example5;

public class TestBox
{
    public static void MainExample()
    {
        Box obj = new Box();
        
        obj.CalculateArea(4.56);
        obj.CalculateArea(4, 7);
        obj.CalculateArea(3);
    }
}