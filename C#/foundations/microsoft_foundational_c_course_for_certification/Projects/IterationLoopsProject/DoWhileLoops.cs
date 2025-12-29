using System.Runtime.CompilerServices;
using System.Runtime.Intrinsics.Arm;

namespace CourseExcercises.Projects.IterationLoopsProject;

public class DoWhileLoops
{
    public static void MainExample()
    {
        DoWhile();
        While();
        DoWhileBreak();
        DoWhileContinue();
    }

    // Do While Loop Example
    public static void DoWhile()
    {
        Random random = new();
        int current = 0;

        do
        {
            current = random.Next(1, 11);
            Console.WriteLine(current);
        } while (current != 7);
    }

    // While loop example
    public static void While()
    {
        Random random = new();
        int current = random.Next(1, 11);

        while (current >= 3)
        {
            Console.WriteLine(current);
            current = random.Next(1, 11);
        }
        Console.WriteLine($"Last number: {current}");
    }

    // Do While Loop with break at certain value example 
    public static void DoWhileBreak()
    {
        Random random = new();
        int current = 0;

        do
        {
            current = random.Next(1, 11);
            Console.WriteLine(current);
        } while (current != 7);

    }

    // While loop that iterates only while a random number is greater than some value example
    public static void DoWhileContinue()
    {
        Random random = new();
        int current = random.Next(1, 11);

        do
        {
            current = random.Next(1, 11);

            if (current < 8) continue;
            Console.WriteLine(current);

            if (current >= 8) continue;
            Console.WriteLine("still here");

        } while (current != 7);
    }

}
