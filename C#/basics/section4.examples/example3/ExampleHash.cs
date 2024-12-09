using System.Collections;
using c_course_cont.section4.examples.exampleproject;

namespace c_course_cont.section4.examples.example3;

public class ExampleHash
{
    // Collections: Hashtable (non generic) and Dictionary (generic)
    public static void MainExample()
    {
        // key value pair

        Hashtable ht = new Hashtable();
        ht.Add(1, "One");
        ht.Add("Two", 2);
        Employee alex = new Employee("alex rod", 68);
        ht.Add("employee", alex);
        ht["car"] = "4 door";
        ht.Remove("Two");
        
        Console.WriteLine(ht["employee"]);
        Console.WriteLine(ht["------------"]);

        // get the keys to loop through
        foreach (Object o in ht.Keys)
        {
            Console.WriteLine(o.ToString() + " : " + ht[o]);
        }
        
        Console.WriteLine("------------------------");
        
        // Dictionary Example 
        Dictionary<string, double> d1 = new Dictionary<string, double>();
        d1.Add("Alex", 100000);
        d1.Add("Linda", 110000);
        d1.Add("John", 120000);
        
        // get the keys
        Console.WriteLine(d1["Linda"]);
        Console.WriteLine("-----------------------------");
        foreach (string x in d1.Keys)
        {
            Console.WriteLine(" For employee {0} the salary is {1}" , x, d1[x]);
        }
    }
}