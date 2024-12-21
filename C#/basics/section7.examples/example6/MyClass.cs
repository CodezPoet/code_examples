namespace c_course_cont.section7.examples.example6;

// Variable number of arguments example
public class MyClass
{
    public void ShowArgs(string msg, params int[] nums)
    {
        Console.Write(msg + " : ");

        foreach (int i in nums)
            Console.Write(i + " ");

        Console.WriteLine("\n-----------------------------------");
    }

    public static void MainExample()
    {
        MyClass ob = new MyClass();
        ob.ShowArgs("Here are some integers", 1, 2, 3, 4, 5);

        ob.ShowArgs("Here are two more", 17, 20);
    }
}