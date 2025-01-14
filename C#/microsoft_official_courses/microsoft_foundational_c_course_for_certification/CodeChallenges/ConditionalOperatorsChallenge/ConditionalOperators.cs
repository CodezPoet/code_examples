namespace CourseExcercises.CodeChallenges.ConditionalOperatorsChallenge;

public class ConditionalOperators
{
    public static void MainExample() {
       Random random = new Random();
       int resultCoinFlip = random.Next(0, 2);
       Console.Write(resultCoinFlip == 0 ? "Heads" : "Tails");
    }
}
