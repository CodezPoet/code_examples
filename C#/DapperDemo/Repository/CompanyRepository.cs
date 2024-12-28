using System.Data;
using Dapper;
using DapperDemo.Data;
using DapperDemo.Models;
using Microsoft.Data.SqlClient;

namespace DapperDemo.Repository;

public class CompanyRepository : ICompanyRepository
{
    private IDbConnection db;

    public CompanyRepository(IConfiguration configuration)
    {
        this.db = new SqlConnection(configuration.GetConnectionString("DefaultConnection"));
    }

    public Company Find(int id)
    {
        // Always use parameters for security like @CompanyId, never use the + sign outside of the " 
        // Similar as PHP PDO how parameters and properties are used below
        var sql = "SELECT * from Companies where CompanyId = @Companyid";
        return db.Query<Company>(sql, new { Companyid = id }).Single();
    }

    public List<Company> GetAll()
    {
        var sql = "SELECT * FROM Companies";
        return db.Query<Company>(sql).ToList();
    }

    // Similar as PHP PDO how parameters and properties are used below
    public Company Add(Company company)
    {
        var sql =
            "INSERT INTO Companies (Name, Address, City, State, PostalCode) VALUES(@Name, @Address, @City, @State, @PostalCode);"
            + "SELECT CAST(SCOPE_IDENTITY() as int)";

        // Option 1
        //var id = db.Query<int>(sql, new
        //    {
        //        company.Name,
        //       company.Address,
        //       company.City,
        //       company.State,
        //        company.PostalCode
        //    }).Single();

        //Option 2
        var id = db.Query<int>(sql, company).Single();
        company.CompanyId = id;
        return company;
    }

    public Company Update(Company company)
    {
        var sql = "UPDATE Companies SET Name = @Name, Address = @Address, City = @City, " +
                  "State = @State, PostalCode = @PostalCode WHERE CompanyId = @CompanyId";
        db.Execute(sql, company);
        return company;
    }

    public void Remove(int id)
    {
        var sql = "DELETE FROM Companies WHERE CompanyId = @Id";
        db.Execute(sql, new { id });
    }
}