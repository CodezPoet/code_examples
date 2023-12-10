using System;

namespace ConsoleCodeExamples
{
    /// <summary>
    /// Console program to determine the blood pressure category based on Systolic and Diastolic blood pressure
    /// </summary>
    internal class BloodPressureMeasurements
    {
        // The Main method
        static void Main()
        {
            ConsoleView(); 
        }

        //  Console view
        static void ConsoleView()
        {
            do
            {
              string showResult = ShowResult();
                Console.WriteLine(showResult);
            } while (AskToRunAgain());
        }

        // Get the user blood pressure measurements from the console input
        static (int systolicPressure, int diastolicPressure) GetUserInput()
        {
            int systolicPressure;
            int diastolicPressure;
            do
            {
                Console.WriteLine("Enter Systolic Pressure (mm Hg)");
            } while (!int.TryParse(Console.ReadLine(), out systolicPressure));
            do
            {
                Console.WriteLine("Enter Diastolic Pressure (mm Hg)");
            } while (!int.TryParse(Console.ReadLine(), out diastolicPressure));
            return (systolicPressure, diastolicPressure);
        }

        // Categories for bloodpressure to be used to calculate blood pressure category
        static string DisplayBloodPressureCategory(int systolicPressure, int diastolicPressure)
        {
            string categorySentence = "Your blood pressure category is: ";
            string invalidInput = "Invalid input. Please enter positive values for both systolic and diastolic pressures.";
            string bloodPressureCategory;
            if (systolicPressure <= 0 || diastolicPressure <= 0)
            {
                return invalidInput;
            }
            else if (180 <= systolicPressure || 120 <= diastolicPressure)
            {
                bloodPressureCategory = "Hypertensive crisis. Call Emergency Medical Services Now";
            }
            else if (140 <= systolicPressure || 90 <= diastolicPressure)
            {
                bloodPressureCategory = "Stage 2 high blood pressure (hypertension)";
            }
            else if (130 <= systolicPressure || 80 <= diastolicPressure)
            {
                bloodPressureCategory = "Stage 1 high blood pressure (hypertension)";
            }
            else if (120 <= systolicPressure && 80 > diastolicPressure)
            {
                bloodPressureCategory = "Elevated";
            }
            else if (90 > systolicPressure || 60 > diastolicPressure)
            {
                bloodPressureCategory = "Low";
            }
            else
            {
                bloodPressureCategory = "Normal";
            }
            return categorySentence + bloodPressureCategory;
        }

        // Return the result for the blood pressure category based on blood pressure
        static string ShowResult()
        {
            int systolicPressure;
            int diastolicPressure;
            string bloodPressureCategory;
            (systolicPressure, diastolicPressure) = GetUserInput();
            bloodPressureCategory = DisplayBloodPressureCategory(systolicPressure, diastolicPressure);
            return bloodPressureCategory;
        }

        // Ask to run the application again in case want to enter multiple times without closing console
        static bool AskToRunAgain()
        {
            Console.WriteLine("Do you want to run the application again? (y/n)");
            char response = Console.ReadKey().KeyChar;
            Console.WriteLine();
            return response == 'y' || response == 'Y';
        }
    }
}
