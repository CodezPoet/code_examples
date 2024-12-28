namespace c_course_cont.section3.examples.example5
{
    public class Cube : Square
    {
        protected int someNumber = 20;

        public override double CalculateArea(int length)
        {
            double volume = base.CalculateArea(length) * 6;
            Console.WriteLine("Cube Volume = " + volume);
            Console.WriteLine("Cube someNumber = " + someNumber);
            Console.WriteLine("Square someNUmber = " + base.someNumber);
            return volume;
        }
    }
}