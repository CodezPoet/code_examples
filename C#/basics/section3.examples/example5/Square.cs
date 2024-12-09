namespace c_course_cont.section3.examples.example5
{
    public class Square
    {
        protected int someNumber = 10;

        public virtual double CalculateArea(int length)
        {
            Console.WriteLine("Square Area = " + (length * length));
            return (length * length);

        }
    }
}