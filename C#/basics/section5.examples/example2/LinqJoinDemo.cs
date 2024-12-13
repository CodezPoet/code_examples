namespace c_course_cont.section5.examples.example2;

public class LinqJoinDemo
{
    public static void MainExample()
    {
        Employee[] emps =
        {
            new Employee(100, "Alex"),
            new Employee(200, "Lynda"),
            new Employee(300, "Join")
        };

        Salary[] salaries =
        {
            new Salary(100, 92000),
            new Salary(200, 115000),
            new Salary(300, 83000),
        };

        var result = from e in emps
            join s in salaries
                on e.EId equals s.EId
            select new Temp(e.name, s.salary);
        Console.WriteLine("Name\tSalary\n");

        // Execute the query and display the results.
        foreach (Temp t in result)
            Console.WriteLine("{0}\t{1}", t.name, t.salary);

        Console.WriteLine("---------------");

        // Create a query that joins Item with InStockStatus to
        // produce a  list of item names and availability. 
        // Now, an anonomymous tpye is used
        var result2 = from e in emps
            join s in salaries
                on e.EId equals s.EId
            select new { e.name, s.salary };

        Console.WriteLine("Name\tSalary\n");
        //Execute the query and display the results
        foreach (var t in result2)
            Console.WriteLine("{0}\t{1}", t.name, t.salary);
    }
}