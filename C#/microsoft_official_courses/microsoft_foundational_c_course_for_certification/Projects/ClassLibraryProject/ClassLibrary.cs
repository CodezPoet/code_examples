using System;

namespace CourseExcercises.Projects.ClassLibraryProject;

public class ClassLibrary
{
    public static void MainExample()
    {
        Random dice = new();
        int roll = dice.Next(1, 7);
       
        Console.WriteLine(roll);
      
        int roll1 = dice.Next();
        int roll2 = dice.Next(101);
        int roll3 = dice.Next(50, 101);

        Console.WriteLine($"First roll: {roll1}");
        Console.WriteLine($"Second roll: {roll2}");
        Console.WriteLine($"Third roll: {roll3}");

        int firstValue = 500;
        int secondValue = 600;
        
        int largerValue = Math.Max(firstValue, secondValue);
        
        Console.WriteLine(largerValue);

    }
}
