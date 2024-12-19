namespace c_course_cont.section8.examples.example1;
public class MyClass 
{
    public int x;
}

public class ClassAssignment
{
    public static void MainExample()
    {
        MyClass a = new MyClass();
        MyClass b = new MyClass();
        a.x = 10;
        b.x = 20;
        Console.WriteLine("a.x {0}, b.x {1}", a.x, b.x);
        a = b; // now a and b refer to the same object
        // if b changes a changes
        b.x = 30;
        Console.WriteLine("a.x {0}, b.x {1}", a.x, b.x);
    }
}