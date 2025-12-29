namespace c_course_cont.section3.exampleproject;

public class Department
{
    private string deptName;
    private double deptBudget;
    private int counter = 0;

    // int[] x = new int[6]
    Employee[] emps = new Employee[5];

    public void AddEmployee(Employee obj)
    {
        emps[counter] = obj;
        counter++;
        if (obj.empGrade > 5)
        {
            this.deptBudget += 150000;
        }
        else
        {
            this.deptBudget += 100000;
        }
    }

    public void Describe()
    {
        string temp = "Department : " + this.deptName +
                      "\nTotal budget : " + this.deptBudget +
                      "\nEmployees :";

        foreach (Employee t in emps)
        {
            if (t != null)
            {
                temp += t.ReturnNameGrade() + " ";
            }
        }

        Console.WriteLine(temp);
    }

    public Department(string deptName)
    {
        this.deptName = deptName;
        this.deptBudget = 50000;
    }
}