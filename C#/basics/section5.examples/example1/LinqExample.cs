namespace c_course_cont.section5.examples.example1;

public class LinqExample
{
    public static void MainExample()
    {
        List<int> nums = new List<int>();
        nums.Add(1);
        nums.Add(2);
        nums.Add(3);
        nums.Add(0);
        nums.Add(-4);
        nums.Add(5);
        nums.Add(11);

        // Create a query that obtains only positive numbers
        var posNums = from n in nums
            where n > 0
            select n;

        Console.WriteLine("The positive values in nums: ");
        nums[1] = 100;
        // Execute the query and display the results.
        foreach (int i in posNums)
            Console.Write(i + " ");

        Console.WriteLine("\n-------------------------");

        var posNumRange = from n in nums
            where n > 0 && n < 10
            select n;
        foreach (int i in posNumRange) Console.Write(i + " ");

        Console.WriteLine("\n-------------------------");

        var posNumsOrder = from n in nums
            orderby n descending
            select n;

        foreach (int i in posNumsOrder) Console.Write(i + " ");

        Console.WriteLine("\n---------------------------");

        var sqrRoots = from n in nums
            where n > 0
            select Math.Sqrt(n);
        foreach (double r in sqrRoots) Console.Write("{0:#.##} " + r);

        Console.WriteLine("\n----------------------");

        var queryResults = from n in nums
            where n > 0
            select n;

        Console.WriteLine("Count " + queryResults.Count()); // query executes
        Console.WriteLine("Max " + queryResults.Max());
        Console.WriteLine("Min " + queryResults.Min());
        Console.WriteLine("Average " + queryResults.Average());
        Console.WriteLine("Sum " + queryResults.Sum());

        Console.WriteLine("\n---------------------");
    }
}