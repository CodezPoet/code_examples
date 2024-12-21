using System.Diagnostics.CodeAnalysis;

namespace c_course_cont.section9.exampleunittest
{
    [ExcludeFromCodeCoverage]
    internal class TestEmployee
    {
        public static void MainExample()
        {
            Employee alex = new Employee(100000);
            Console.WriteLine(alex.CalculateTotalPay(100000, 20000));
        }
    }
}