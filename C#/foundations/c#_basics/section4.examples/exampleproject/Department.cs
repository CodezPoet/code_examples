namespace c_course_cont.section4.examples.exampleproject;

public class Department
{
    private string deptName;
    private double deptBudget;
    private int counter = 0;

    List<Employee> emps = new List<Employee>();

    public void AddEmployee(Employee obj)
    {
        //  emps[counter] = obj;
        emps.Add(obj);
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
            temp += t + " ";
        }

        Console.WriteLine(temp);
    }

    public Department(string deptName)
    {
        this.deptName = deptName;
        this.deptBudget = 50000;
    }
}