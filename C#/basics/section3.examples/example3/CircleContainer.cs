namespace c_course_cont.section3.examples.example3;

class CircleContainer: Container {
    public override double AreaOfBase(int length)
    {
        double area = Math.PI * (length / 2) * (length / 2);
        Console.WriteLine("Circle Area = " + area);
        return area;
    }
}