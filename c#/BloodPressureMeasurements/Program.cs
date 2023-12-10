using System;

namespace BloodPressureMeasurements
{
    internal class Program
    {
        // The Main method
        static void Main()
        {
            do
            {
                var (systolicPressure, diastolicPressure) = GetUserInput();

                DisplayBloodPressureCategory(systolicPressure, diastolicPressure);

            } while (AskToRunAgain());
        }
        // Input and Output to console
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
        static void DisplayBloodPressureCategory(int systolicPressure, int diastolicPressure)
        {
            string categorySentence = "Your blood pressure category is: ";

            if (systolicPressure <= 0 || diastolicPressure <= 0)
            {
                Console.WriteLine("Invalid input. Please enter positive values for both systolic and diastolic pressures.");
            }
            else if (180 <= systolicPressure || 120 <= diastolicPressure)
            {
                Console.WriteLine(categorySentence + "Hypertensive crisis. Call Emergency Medical Services Now");
            }
            else if (140 <= systolicPressure || 90 <= diastolicPressure)
            {
                Console.WriteLine(categorySentence + "Stage 2 high blood pressure (hypertension)");
            }
            else if (130 <= systolicPressure || 80 <= diastolicPressure)
            {
                Console.WriteLine(categorySentence + "Stage 1 high blood pressure (hypertension)");
            }
            else if (120 <= systolicPressure && 80 > diastolicPressure)
            {
                Console.WriteLine(categorySentence + "Elevated");
            }
            else if (90 > systolicPressure || 60 > diastolicPressure)
            {
                Console.WriteLine(categorySentence + "Low");
            }
            else
            {
                Console.WriteLine(categorySentence + "Normal");
            }

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
