namespace c_course_1.section3.exampleproject;

public class Employee
{
    private string empName;
    public int empGrade { private set; get; }

    public Employee(string empName, int empGrade)
    {
        this.empName = empName;
        this.empGrade = empGrade;
    }

    public string ReturnNameGrade()
    {
        string temp = empName + "(" + empGrade + ")";
        return temp;
    }
}