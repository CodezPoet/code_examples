namespace c_course_cont.section2.examples.example2;

public class Box
{
    public int length;
    public int width;

    public int CalculateArea(int length, int width)
    {
        int area = length * width;
        // int area = this.length * this.width;
        Console.WriteLine("Area = " + area);
        return area;
    }
}