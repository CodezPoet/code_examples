namespace c_course_cont.section3.examples.example3;

public abstract class Container
{
    public void CalculateVolume(int height, int length)
    {
        double volume = AreaOfBase(length) * height;
        Console.WriteLine("Volume = " + volume);
    }

    public abstract double AreaOfBase(int length);
}