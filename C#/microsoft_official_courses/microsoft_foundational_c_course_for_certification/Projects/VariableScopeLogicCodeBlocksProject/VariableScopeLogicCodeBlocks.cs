namespace CourseExcercises.Projects.VariableScopeLogicCodeBlocksProject;

public class VariableScopeLogicCodeBlocks
{
    public static void MainExample()
    {
        bool flag = true;
        int value = 10;

        if (flag)
        {
            Console.WriteLine($"Inside the code block: {value}");
        }

        Console.WriteLine($"Outside the code block: {value}");
    }

    public static void CheckYourKnowledge()
    {
        int value = 5;

        if (value > 0)
        {
            int value2 = 6;
            value = value + value2;
        }
        Console.WriteLine(value);
    }

    public static void IfStatements()
    {
        bool flag = true;
        if (flag)
        {
            Console.WriteLine(flag);
        }
    }
}
