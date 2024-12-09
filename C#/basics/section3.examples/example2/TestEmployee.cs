namespace c_course_cont.section3.examples.example2;

// Polymorphism and inheritance example
public class TestEmployee
{
    public static void MainExample()
    {
        Employee alex = new Employee();
        alex.CalculateTax(120000);
        alex.CalculateVacation(7);
        
        Console.WriteLine("--------------------");
        
        PartTimeEmployees lynda  = new PartTimeEmployees();
        lynda.CalculateTax(120000);
        lynda.CalculateVacation(7);
        lynda.PrintContractDetails();
    }
}