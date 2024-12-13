namespace c_course_cont.section5.examples.example2;

public class Employee
{
    public int EId { get; set; }
    public string name { get; set; }

    public Employee(int id, string name)
    {
        this.EId = id;
        this.name = name;
    }
    
}