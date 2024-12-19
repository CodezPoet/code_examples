using c_course_cont.section4.examples.exampleproject;

namespace c_course_cont.section8.examples.example3;

public class TestCalculate
{
    public static void MainExample()
    {
        Calculate obj = new Calculate();
        //  obj.IsEqual("ABC", "AABC");
        Console.WriteLine("Result = " + obj.IsEqual(4.6, 4.4));
        
        Console.WriteLine("2 types - " + obj.IsEqual(4, 4, "AB"));

        Employee alex = new Employee("Alex", 5);
        Employee lynda = new Employee("Lynda", 6);
        Console.WriteLine("3 types - " + obj.IsEqualExample4(alex, lynda, "AB"));
      }
}