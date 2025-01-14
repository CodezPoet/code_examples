namespace CourseExcercises.Projects.ForEachProject;

public class ForEach
{
    public static void MainExample()
    {
        string[] names = ["Rowena", "Robin", "Bao"];
        foreach (string name in names)
        {
            Console.WriteLine(name);
        }

        int[] inventory = [200, 450, 700, 175, 250];
        int sum = 0;
        int bin = 0;
        foreach (int items in inventory)
        {
            sum += items;
            bin++;
            Console.WriteLine($"Bin {bin} = {items} items (Running total: {sum})");
        }
        Console.WriteLine($"We have {sum} items in inventory");

    }
}
