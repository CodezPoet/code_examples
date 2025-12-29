namespace c_course_cont.section4.examples.exampleproject;

public class Employee
{
    private string empName;
    public int empGrade { private set; get; }

    public Employee(string empName, int empGrade)
    {
        this.empName = empName;
        this.empGrade = empGrade;
    }

    public override string ToString()
    {
        string temp = empName + "(" + empGrade + ")";
        return temp;
    }
}