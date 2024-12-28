namespace c_course_cont.section7.examples.example1;

// sealed class B
// prevents class rom being inherited
// same goes for overrided method in a class
// sealed class and sealed method do not have to be used together, just for illustration
// purposes of the different ways available
sealed class B : A
{
    public void MethodB()
    {
        Console.WriteLine("some method B");
    }

    public sealed override void methodA() // sealed public override method
    {
        Console.WriteLine("some method A");
    }
}