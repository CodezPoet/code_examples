namespace c_course_cont.section3.examples.example1;

// class BigBox inherits (extends) Box
public class BigBox : Box
{
    public void CalculateVolume(int length, int width, int height)
    {
        Console.WriteLine("Volume = " + (length * width * height));
    }
}