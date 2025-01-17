namespace CourseExcercises.Projects.SwitchCaseProject;

public class SwitchCase
{
    public static void MainExample()
    {
        int employeeLevel = 100;
        string employeeName = "John Smith";

        string title = "";

        switch (employeeLevel)
        {
            //   case 100:
            //       title = "Junior Associate";
            //      break;

            // can use multiple labels for a switch section
            case 100:
            case 200:
                title = "Senior Associate";
                break;

            case 300:
                title = "Manager";
                break;

            case 400:
                title = "Senior Manager";
                break;

            default:
                title = "Associate";
                break;
        }

        Console.WriteLine($"{employeeName}, {title}");
    }
}
