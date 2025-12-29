namespace c_course_cont.section3.examples.example2;

public class PartTimeEmployees : Employee
{
    public void PrintContractDetails()
    {
        Console.WriteLine("Print contract details xyx");
    }

    public override void CalculateVacation(int grade)
    {
        if (grade > 5)
        {
            Console.WriteLine("Vacation days = " + 8);
        }
        else
        {
            Console.WriteLine("Vacation days = " + 4);
        }
    }
}