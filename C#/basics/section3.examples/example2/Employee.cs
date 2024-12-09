namespace c_course_cont.section3.examples.example2;

public class Employee
{
    public void CalculateTax(double pay)
    {
        if (pay > 100000)
        {
            Console.WriteLine("Tax = " + (pay * .30));
        }
        else
        {
            Console.WriteLine("Tax = " + (pay * .20));
        }
    }

    public virtual void CalculateVacation(int grade)
    {
        if (grade > 5)
        {
            Console.WriteLine("Vacation days = " + 10);
        }
        else
        {
            Console.WriteLine("Vacation days = " + 7);
        }
    }
    }