using c_course_cont.section4.examples.exampleproject;

namespace c_course_cont.section8.examples.example3;

public class Calculate
{
    // public void IsEqual(int var1, int var2) are hardcoded parameters (e.g. string, int),
    // which can only be that type
    // using <T> and T can allow for multiple types, while the types still are the same type
    // this to avoid comparing an int to a string for example in this case. Since
    // we are looking to compare if the values of the same type are equal or not
    // It doesn't have to be T, it can be any letter (X, Y, etc)
    // "T" means it will receive some type of datatype of type T, and that both type are the same
    // This way can reuse this method for comparison, instead of having to write a new method for
    // every datatype, if that is what you chose to do

    //Example 1
    // public void IsEqual<T>(T var1, T var2)

    // You can use Generics not only as passing arguments, but also as return type
    // Example 2
    public T IsEqual<T>(T var1, T var2)
    {
        //  if (var1 == var2)
        // when using <> in the method need to use Equals instead of == for comparison
        if (var1.Equals(var2))
        {
            Console.WriteLine("Both are equal");
        }
        else
        {
            Console.WriteLine("Both are not equal");
        }

        return var1;
    }

    // You are not restricted to using one type, you can use multiple (<T,Y> e.g.)
    // Example 3
    public S IsEqual<T, S>(T var1, T var2, S var3)
    {
        string type1 = typeof(T).ToString();
        string type2 = typeof(S).ToString();
        Console.WriteLine("the type of T is" + type1);
        Console.WriteLine("the type of S is" + type2);
        return var3;
    }

    // We can restrict to Object
    // Can also use inherited subclasses
    // Example 4
    public S IsEqualExample4<T, S>(T var1, T var2, S var3) where T : Employee
    {
        Console.WriteLine(var1.ToString());
        return var3;
    }
}