namespace c_course_cont.section5.examples.example2;

public class Salary
{
    public int EId { get; set; }
    public double salary { get; set; }

    public Salary(int id, double salary)
    {
        this.EId = id;
        this.salary = salary;
    }
}