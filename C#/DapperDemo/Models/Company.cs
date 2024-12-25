using Dapper.Contrib.Extensions;

namespace DapperDemo.Models;

// Dapper Contrib Option
[Dapper.Contrib.Extensions.Table("Companies")]
public class Company
{
    // Option 1: In Entity Framework if you add Id to the name it will automatically become the primary key 
    // Option 2: Dapper Contrib: [Key]
    [Key]
    public int CompanyId { get; set; }
    public string Name { get; set; }
    public string Address { get; set; }
    public string City { get; set; }
    public string State { get; set; }
    public string PostalCode { get; set; }

    //If using for foreign key in employees, with Fluent Api, instead Entity Framework key in Employee.cs
    // Dapper Contrib:
    [Write(false)]
    public List<Employee>? Employees { get; set; }
}