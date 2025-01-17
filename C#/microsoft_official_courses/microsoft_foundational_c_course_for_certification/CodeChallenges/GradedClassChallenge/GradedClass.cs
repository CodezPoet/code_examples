namespace CourseExcercises.CodeChallenges.GradedClassChallenge;

public class GradedClass
{
    /* 
        This C# console application is designed to:        
            - Use arrays to store student names and assignment scores.
            - Use a `foreach` statement to iterate through the student names as an outer program loop.
            - Use an `if` statement within the outer loop to identify the current student name and access that student's assignment scores.
            - Use a `foreach` statement within the outer loop to iterate though the assignment scores array and sum the values.
            - Use an algorithm within the outer loop to calculate the average exam score for each student.
            - Use an `if-elseif-else` construct within the outer loop to evaluate the average exam score and assign a letter grade automatically. 
            - Integrate extra credit scores when calculating the student's final score and letter grade as follows:
                - detects extra credit assignments based on the number of elements in the student's scores array.
                - divides the values of extra credit assignments by 10 before adding extra credit scores to the sum of exam scores.    
            - use the following report format to report student grades: 

                Student         Grade

                Sophia:         92.2    A-
                Andrew:         89.6    B+
                Emma:           85.6    B
                Logan:          91.2    A-
*/
    public static void MainExample()
    {

        int examAssignments = 5;

        string[] studentNames = new string[] { "Sophia", "Andrew", "Emma", "Logan" };

        int[] sophiaScores = new int[] { 90, 86, 87, 98, 100, 94, 90 };
        int[] andrewScores = new int[] { 92, 89, 81, 96, 90, 89 };
        int[] emmaScores = new int[] { 90, 85, 87, 98, 68, 89, 89, 89 };
        int[] loganScores = new int[] { 90, 95, 87, 88, 96, 96 };

        int[] studentScores = new int[10];

        string overallStudentLetterGrade = "";

        // display the header row for scores/grades
        Console.Clear();
        Console.WriteLine("Student\t\tExam Score\tOverall Grade\tExtra Credit\n");

        /*
            The outer foreach loop is used to:
                - iterate through student names 
                - assign a student's grades to the studentScores array
                - sum assignment scores (inner foreach loop)
                - calculate numeric and letter grade
                - write the score report information
        */
        foreach (string name in studentNames)
        {
            string currentStudent = name;

            if (currentStudent == "Sophia")
                studentScores = sophiaScores;

            else if (currentStudent == "Andrew")
                studentScores = andrewScores;

            else if (currentStudent == "Emma")
                studentScores = emmaScores;

            else if (currentStudent == "Logan")
                studentScores = loganScores;

            int gradedAssignments = 0;
            decimal sumAssignmentScores = 0;
            decimal overallStudentGrade = 0;

            int countExams = 0; 
            decimal sumExamScores = 0;
            decimal averageExamScore = 0;
      
            int countExtraCreditAssignments = 0;
            decimal sumExtraCreditScores = 0;
            decimal extraCreditAverageScore = 0;
            decimal impactExtraCredit = 0;

            /* 
                the inner foreach loop sums assignment scores
                extra credit assignments are worth 10% of an exam score
            */
            foreach (int score in studentScores)
            {
                gradedAssignments += 1;

                if (gradedAssignments <= examAssignments)
                {
                    sumAssignmentScores += score;
                    countExams +=1;
                    sumExamScores += score;
                }
                else
                {
                    sumAssignmentScores += score / 10m;
                    sumExtraCreditScores += score;
                    countExtraCreditAssignments += 1;
                }
            }

            overallStudentGrade = (decimal)sumAssignmentScores / examAssignments;
            averageExamScore =  (decimal)sumExamScores /countExams;
            extraCreditAverageScore = (decimal)sumExtraCreditScores / countExtraCreditAssignments;
            impactExtraCredit = (decimal)sumExtraCreditScores / examAssignments / 10m;

            if (overallStudentGrade >= 97)
                overallStudentLetterGrade = "A+";

            else if (overallStudentGrade >= 93)
                overallStudentLetterGrade = "A";

            else if (overallStudentGrade >= 90)
                overallStudentLetterGrade = "A-";

            else if (overallStudentGrade >= 87)
                overallStudentLetterGrade = "B+";

            else if (overallStudentGrade >= 83)
                overallStudentLetterGrade = "B";

            else if (overallStudentGrade >= 80)
                overallStudentLetterGrade = "B-";

            else if (overallStudentGrade >= 77)
                overallStudentLetterGrade = "C+";

            else if (overallStudentGrade >= 73)
                overallStudentLetterGrade = "C";

            else if (overallStudentGrade >= 70)
                overallStudentLetterGrade = "C-";

            else if (overallStudentGrade >= 67)
                overallStudentLetterGrade = "D+";

            else if (overallStudentGrade >= 63)
                overallStudentLetterGrade = "D";

            else if (overallStudentGrade >= 60)
                overallStudentLetterGrade = "D-";

            else
                overallStudentLetterGrade = "F";

            // Student         Grade
            // Sophia:         92.2    A-

            Console.WriteLine($"{currentStudent}\t\t{averageExamScore}\t\t{overallStudentGrade}\t{overallStudentLetterGrade}\t{extraCreditAverageScore} ({impactExtraCredit} pts)");
        }

        // required for running in VS Code (keeps the Output windows open to view results)
        Console.WriteLine("\n\rPress the Enter key to continue");
        Console.ReadLine();
 
    }
}
