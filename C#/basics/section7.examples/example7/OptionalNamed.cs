namespace c_course_cont.section7.examples.example7;

// Optional arguments allow you to give you default values
public class OptionalNamed
{
     public static void OptArgMeth(int alpha, int beta = 10, int gamma = 20)
     {
          Console.WriteLine("Here is alpha, beta, and gamma: " + alpha + " " + beta + " " + gamma);
     }

     public static void MainExample()
     {
          // Pas all arguments explicitly
          OptArgMeth(1, 2, 3);
          // Let gamma default
          OptArgMeth(1, 2);
          // Let both beta and gamma defalt
          OptArgMeth(1);
          // Use first and last parameter to pass for example
          OptArgMeth(alpha: 1, gamma: 2);
     }
}