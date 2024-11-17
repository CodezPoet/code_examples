namespace c_course_1.section2.examples.example3;

public class SmallBox
{
    public int length;
    public int width; 

    /*
     * Constructor:
     * a) Is a method that has the same name as the class.
     * b) It is executed when an object is created
     * c) Used to set default/initial values for an object
     */
    public SmallBox()
    {
        length = 6;
        width = 5;
        Console.WriteLine("Constructor fired");
    }

    public SmallBox(int length, int width)
    {
        this.length = length;
        this.width = width;
    }
    
    public void CalculateArea()
    {
        Console.WriteLine("Area = " + (length * width));
    }
}