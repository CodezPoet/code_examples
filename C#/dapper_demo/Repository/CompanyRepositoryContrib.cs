using System.Data;
using Dapper;
using Dapper.Contrib.Extensions;
using DapperDemo.Data;
using DapperDemo.Models;
using Microsoft.Data.SqlClient;

namespace DapperDemo.Repository;

public class CompanyRepositoryContrib : ICompanyRepository
{
    private IDbConnection db;

    public CompanyRepositoryContrib(IConfiguration configuration)
    {
        this.db = new SqlConnection(configuration.GetConnectionString("DefaultConnection"));
    }

    public Company Find(int id)
    {
        return db.Get<Company>(id);
    }

    public List<Company> GetAll()
    {
        return db.GetAll<Company>().ToList();
    }

    public Company Add(Company company)
    {
        var id = db.Insert(company);
        company.CompanyId = (int)id;
        return company;
    }

    public Company Update(Company company)
    {
       db.Update(company);
       return company;
    }

    public void Remove(int id)
    {
        db.Delete(new Company { CompanyId = id});
    }
}