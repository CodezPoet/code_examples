namespace c_course_cont.section7.examples.example3;

// In C# filename and Class name do not have to be the same (unlike Java for example)
// In C# multiple Classes can be contained in one filename (unlike Java for example)
partial class Box
{
    public void MethodB()
    {
        Console.WriteLine("Method B");
    }

    partial void MethodC()
    {
        Console.WriteLine("Method C");
    }
}

partial class Box
{
    public void CallC()
    {
        MethodC();
    }
}