namespace c_course_1.section2.examples.example3;

public class TestSmallBox
{
    public static void MainExample()
    {
        SmallBox fedEx1 = new SmallBox(3,4);
        //  fedEx1.length = 6;
        //  fedEx1.width = 5;
        fedEx1.CalculateArea();

        SmallBox fedEx2 = new SmallBox();
        //   fedEx2.length = 6;
        //  fedEx2.width = 5;
        fedEx2.CalculateArea();
    }
}
