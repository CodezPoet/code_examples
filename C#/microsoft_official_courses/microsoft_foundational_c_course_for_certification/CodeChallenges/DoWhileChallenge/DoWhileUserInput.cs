using System;
using System.Runtime.Intrinsics.Arm;

namespace CourseExcercises.CodeChallenges.DoWhileChallenge
{
    public class DoWhileUserInput
    {

        public static void MainExample()
        {
            // Project1.Project1Example();
            Project2.Project2Example();
        }
    }

    /*
       Code project 1 - write code that validates integer input
       Here are the conditions that your first coding project must implement:

           - Your solution must include either a do-while or while iteration.

           - Before the iteration block: your solution must use a Console.WriteLine() statement to prompt the user for an integer value between 5 and 10.

           - Inside the iteration block:

               - Your solution must use a Console.ReadLine() statement to obtain input from the user.
               - Your solution must ensure that the input is a valid representation of an integer.
               - If the integer value isn't between 5 and 10, your code must use a Console.WriteLine() statement to prompt the user for an integer value between 5 and 10.
               - Your solution must ensure that the integer value is between 5 and 10 before exiting the iteration.

           - Below (after) the iteration code block: your solution must use a Console.WriteLine() statement to inform the user that their input value has been accepted.
    */
    public class Project1
    {
        public static void Project1Example()
        {
            int numericValue = 0;
            bool validNumber = false;
            string? readResult;

            do
            {
                Console.WriteLine("Enter an integer between 5 and 10");
                readResult = Console.ReadLine();
                validNumber = int.TryParse(readResult, out numericValue);
                if (validNumber == true)
                {
                    if (numericValue > 5 && numericValue < 10)
                    {
                        break;
                    }
                    else
                    {
                        Console.WriteLine($"You entered {readResult}. Please enter a number between 5 and 10");
                    }
                }
                else
                {
                    Console.WriteLine("Sorry, you entered an invalid number, please try again");
                }

            } while (numericValue < 5 || numericValue > 10);

            Console.WriteLine($"Your input value ({numericValue}) has been accepted");
        }
    }

    /*
        Here are the conditions that your second coding project must implement:

            - Your solution must include either a do-while or while iteration.

            - Before the iteration block: your solution must use a Console.WriteLine() statement to prompt the user for one of three role names: Administrator, Manager, or User.

            - Inside the iteration block:

                - Your solution must use a Console.ReadLine() statement to obtain input from the user.
                - Your solution must ensure that the value entered matches one of the three role options.
                - Your solution should use the Trim() method on the input value to ignore leading and trailing space characters.
                - Your solution should use the ToLower() method on the input value to ignore case.
                - If the value entered isn't a match for one of the role options, your code must use a Console.WriteLine() statement to prompt the user for a valid entry.
                - Below (after) the iteration code block: Your solution must use a Console.WriteLine() statement to inform the user that their input value has been accepted.
    */
    public class Project2
    {
        public static void Project2Example()
        {
            string? readResult;
            string checkReadResult = "";

            Console.WriteLine("Enter your role name (Administrator, Manager, or User)");

            do
            {
                readResult = Console.ReadLine();
                if (readResult != null)
                {
                    checkReadResult = readResult.ToLower().Trim();

                    if (checkReadResult == "administrator" || checkReadResult == "manager" || checkReadResult == "user")
                    {
                        break;
                    }
                    else
                    {
                        Console.WriteLine($"The role name that you entered, {readResult} is not valid. Enter your role name (Administrator, Manager, or User)");
                    }
                }

            } while (checkReadResult != "administrator" && checkReadResult != "manager" && checkReadResult != "user");

            Console.WriteLine($"Your input value {readResult} has been accepted");
        }
    }

    /*

        Code project 3 - Write code that processes the contents of a string array
        Here are the conditions that your third coding project must implement:

            - Your solution must use the following string array to represent the input to your coding logic:

                string[] myStrings = new string[2] { "I like pizza. I like roast chicken. I like salad", "I like all three of the menu choices" };

            - Your solution must declare an integer variable named periodLocation that can be used to hold the location of the period character within a string.

            - Your solution must include an outer foreach or for loop that can be used to process each string element in the array. The string variable that you'll process inside the loops should be named myString.

            - In the outer loop, your solution must use the IndexOf() method of the String class to get the location of the first period character in the myString variable. The method call should be similar to: myString.IndexOf("."). If there's no period character in the string, a value of -1 will be returned.

            - Your solution must include an inner do-while or while loop that can be used to process the myString variable.

            - In the inner loop, your solution must extract and display (write to the console) each sentence that is contained in each of the strings that are processed.

            - In the inner loop, your solution must not display the period character.

            - In the inner loop, your solution must use the Remove(), Substring(), and TrimStart() methods to process the string information.
    */

    public class Project3
    {
        public static void Project3Example()
        {
            string[] myStrings = new string[2] { "I like pizza. I like roast chicken. I like salad", "I like all three of the menu choices" };
            int stringsCount = myStrings.Length;

            string myString = "";
            int periodLocation = 0;

            for (int i = 0; i < stringsCount; i++)
            {
                myString = myStrings[i];
                periodLocation = myString.IndexOf(".");

                string mySentence;

                while (periodLocation != -1)
                {
                    mySentence = myString.Remove(periodLocation);

                    myString = myString.Substring(periodLocation + 1);

                    myString = myString.TrimStart();

                    periodLocation = myString.IndexOf(".");

                    Console.WriteLine(mySentence);
                }

                mySentence = myString.Trim();
                Console.WriteLine(mySentence);
            }
        }
    }
}