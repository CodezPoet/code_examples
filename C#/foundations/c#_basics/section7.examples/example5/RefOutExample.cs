namespace c_course_cont.section7.examples.example5;

// passing by value or passing by reference
public class RefOutExample
{
    public void SomeMethodA(int a)
    {
        // Passed in values example. The passed in value is 10
        // So a 100 = 10 * 10 , but i is still 10
        a = a * a;
    }

    public void SomeMethodB(ref int a)
    {
        // so, when it passes here throught the ref (reference,
        // the memory location i is pointing at  becomes 10 * 10 = 100
        // so a (i) is 100
        a = a * a;
    }

    public int GetParts(double n, out double frac)
    {
        int whole;
        whole = (int)n;
        frac = n - whole; // pass fractional part
        // back through frac
        return whole; // return integer portion
    }
}