namespace CourseExcercises.CodeChallenges.DecisionLogicChallenge;

public class DecisionLogic
{
    /* 
      Instructions:
        If the user is an admin with a level greater than 55 output the message:
        Welcome, Super Admin user.

        If the user is an Admin with level less than or equal to 55, output the message:
        Welcome, Admin user.

        If the user is a Manager with a level 20 or greater, output the message:
        Contact an Admin for access.

        If the user is a Manager with a level less than 20, output the message:
        You do not have sufficient privileges.

        If the use is not an Admin or a Manager, output the message:
        You do not have sufficient privileges.

        Initial configuration data output: 
        Welcome, Admin User
        test for the other business rules
    */
    public static void MainExample()
    {
        string permission = "Admin";
        // string permission = "Manager";
        int level = 15;

        string message = "";

        if (permission.Contains("Admin"))
        {
            message = level > 55 ? "Welcome, Super Admin User" : "Welcome, Admin user";
        }
        else if (permission.Contains("Manager"))
        {
            message = level >= 20 ? "Contact an Admin for Access" : "You do not have sufficient privileges";
        }
        else
        {
            message = "You do not have sufficient privileges";
        }
        
        Console.WriteLine(message);
    }


}
