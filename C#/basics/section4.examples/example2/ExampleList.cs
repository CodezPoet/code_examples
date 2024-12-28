using System.Collections;
using c_course_cont.section4.examples.exampleproject;

namespace c_course_cont.section4.examples.example2;

public class ExampleList
{
    // Example of Collections, to solve for array being fixed amount
    public static void MainExample()
    {
        // An array is fixed length. We cannot add more elements
        string[] arr = new string[10];
        arr[0] = "zero";
        arr[9] = "nine";
        //arr[10] = "onemore"; // Index out of bounds exception

        // How to loop through an array
        foreach (string x in arr)
        {
            Console.WriteLine(x);
        }

        Console.WriteLine("------------------------------");

        // Non Generic Collection
        // With this type of array list (collection) able to add any type of object, and any number of object
        ArrayList list = new ArrayList();
        list.Add(10);
        list.Add("Hello");
        list.Add(true);

        Employee alex = new Employee("Alex Rod", 5);

        list.Add(alex);

        // How to loop through an ArrayList
        // All Classes in C# inherit from Object, Object is a built in superclass for all classes (class A:Object{})
        // Since this ArrayList has different types (e.g. int, string), using Object instead if int, etc will allow to loop through it
        foreach (Object temp in list)
        {
            // ToString is default method used in Object SuperClass, so can use without, so instead of: Console.WriteLine(temp.ToString());  
            // Will automatically ToString(), unless other Object SuperClass method is specified
            Console.WriteLine(temp);
        }

        // Generic collection
        // Generic collections can be limited to one type for example, such as string, int
        List<string> list2 = new List<string>();
        list2.Add("Apples");
        list2.Add("Bananas");
        list2.Add("Oranges");
        list2.Add("Pears");
        list2.Add("Pineapples");

        Console.WriteLine(list2.Count);
        Console.WriteLine("----------------------------");
        list2.Remove("Pears");
        Console.WriteLine(list2.Count);
        Console.WriteLine("-----------------------------");
        foreach (string x in list2)
        {
            Console.WriteLine(x);
        }
    }
}