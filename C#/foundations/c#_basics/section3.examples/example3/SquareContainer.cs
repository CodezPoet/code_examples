namespace c_course_cont.section3.examples.example3;

class SquareContainer : Container
{
    public override double AreaOfBase(int length)
    {
        double area = length * length;
        Console.WriteLine("Square Area = " + area);
        return area;
    }
}