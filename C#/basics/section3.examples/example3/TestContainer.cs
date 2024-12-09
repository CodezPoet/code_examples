namespace c_course_cont.section3.examples.example3;

// example Abstract and Inheritance
class TestContainer {
    
    public static void MainExample()
    {
        Container c1 = new SquareContainer();
        c1.CalculateVolume(10,5);

        c1 = new CircleContainer();
        c1.CalculateVolume(10,5);
    }
}