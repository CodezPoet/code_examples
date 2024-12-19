namespace c_course_cont.section8.examples.example3;

// Not only can Generics be applied to Methods, it can also be applied to Classes
public class GenCalculate<T, S> // where T : Employee
{
    T t; // instead of int T
    S s; // instead of string S

    // public GenCalculate(int T, string S)
    public GenCalculate(T t, S s)
    {
        this.t = t;
        this.s = s;
    }

    public void Printout()
    {
        Console.WriteLine("The value of T " + t.ToString());
        Console.WriteLine("The value of S " + s.ToString());
    }
}