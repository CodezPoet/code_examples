namespace CourseExcercises.CodeChallenges.ReportOrdersForInvestigationChallenge;

public class ReportOrdersForInvestigation
{
    public static void MainExample()
    {
        string[] orderNumbersList = ["B123", "C234", "A345", "C15", "B177", "G3003", "C235", "B179"];

        foreach (string orderNumbers in orderNumbersList)
        {
            if (orderNumbers.StartsWith("B")) {
                Console.WriteLine(orderNumbers);
            }
        }
    }
}
