using System.Reflection;

namespace c_course_cont.section10.examples.example1;

public class TestReflection
{
    public static void MainExample()
    {
        Employee empObj = new Employee();

        //  Type t = empObj.GetType();

        Type t = typeof(Employee);

        // Get Constructor info
        ConstructorInfo[] ci = t.GetConstructors();

        Console.WriteLine("Available constructors: ");
        foreach (ConstructorInfo c in ci)
        {
            // Display return type and name
            Console.Write(" " + t.Name + "(");

            // Display Parameters
            ParameterInfo[] pi = c.GetParameters();

            for (int i = 0; i < pi.Length; i++)
            {
                Console.Write(pi[i].ParameterType.Name + " " + pi[i].Name);
                if (i + 1 < pi.Length) Console.Write(", ");
            }

            Console.WriteLine(")");
        }

        Console.WriteLine("------------------------------");

        Console.WriteLine();
        // The below line will get all methods including base class methods.
        // Since all classes derive from Object, the methods of Object class are shown
        // MethodInfo[] mi = t.GetMethods();

        // The below line will only show methods defined in the class. Not inherited.
        // Instance and public methods only
        MethodInfo[] mi = t.GetMethods(BindingFlags.DeclaredOnly | BindingFlags.Instance | BindingFlags.Public);

        // Invoke each method
        foreach (MethodInfo m in mi)
        {
            // Display return type and name
            Console.Write("       " + m.ReturnType.Name + " " + m.Name + "(");

            // Display parameters.
            ParameterInfo[] pi = m.GetParameters();

            for (int i = 0; i < pi.Length; i++)
            {
                Console.Write(pi[i].ParameterType.Name + " " + pi[i].Name);
                if (i + 1 < pi.Length) Console.Write(", ");
            }

            Console.WriteLine(")");

            Console.WriteLine();
        }
    }
}