namespace c_course_cont.section3.examples.example1;

// Inheritance example
public class TestBox
{
    public static void MainExample()
    {
        Box fedEx = new Box();
        fedEx.calculateArea(4, 5 );

        BigBox ups = new BigBox();
        ups.calculateArea(3, 4 );
        ups.CalculateVolume(3, 4, 5);
    }
}