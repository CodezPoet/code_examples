namespace c_course_1.section2.examples.example2;

public class TestBox
{
    public static void MainExample()
    {
        Box ups, fedEx;
        ups = new Box();
        fedEx = new Box();

       // ups.length = 10;
       // ups.width = 5;
        int total = ups.CalculateArea(3, 4);

       // fedEx.length = 7;
       // fedEx.width = 5;
        total += fedEx.CalculateArea(5, 6);

        Console.WriteLine("Total area = " + total);
    }
}