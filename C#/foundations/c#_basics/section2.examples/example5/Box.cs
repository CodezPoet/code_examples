namespace c_course_cont.section2.examples.example5;

public class Box
{
    public void CalculateArea(int length)
    {
        Console.WriteLine("Area = " + (length * length));
    }

    public void CalculateArea(double length)
    {
        Console.WriteLine("Area double = " + (length * length));
    }

    public void CalculateArea(int length, int width)
    {
        Console.WriteLine("Area = " + (length * width));
    }
}