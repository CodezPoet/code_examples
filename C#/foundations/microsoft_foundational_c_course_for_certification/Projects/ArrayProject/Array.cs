namespace CourseExcercises.Projects.ArrayProject;

public class Array
{
  public static void MainExample()
  {
    // Option 1: Array of integers      
    // string[] fraudelentOrderIDs = new string[3];
    // fraudelentOrderIDs[0] = "A123";
    // fraudelentOrderIDs[1] = "B456";
    // fraudelentOrderIDs[2] = "C789";

    //  fraudelentOrderIDs[3] = "D000";

    string[] fraudelentOrderIDs = ["A123", "B456", "C789"];

    Console.WriteLine($"First: {fraudelentOrderIDs[0]}");
    Console.WriteLine($"Second: {fraudelentOrderIDs[1]}");
    Console.WriteLine($"Third: {fraudelentOrderIDs[2]}");

    fraudelentOrderIDs[0] = "F000";

    Console.WriteLine($"Reassign First: {fraudelentOrderIDs[0]}");

    Console.WriteLine($"There are {fraudelentOrderIDs.Length} fraudulent orders to process");

  }
}
