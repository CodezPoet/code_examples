using DapperDemo.Data;
using DapperDemo.Models;

namespace DapperDemo.Repository;

public class CompanyRepositoryEF : ICompanyRepository
{
    private readonly ApplicationDbContext _db;
    
    public CompanyRepositoryEF(ApplicationDbContext db)
    {
        _db = db;
    }
    public Company Find(int id)
    {
    return _db.Companies.Find(id);
    }

    public List<Company> GetAll()
    {
        return _db.Companies.ToList();
    }

    public Company Add(Company company)
    {
       _db.Companies.Add(company);
       _db.SaveChanges();
       return company;
    }

    public Company Update(Company company)
    {
        _db.Companies.Update(company);
        _db.SaveChanges();
        return company;
    }

    public void Remove(int id)
    {
        Company company = _db.Companies.FirstOrDefault(u => u.CompanyId == id);
        _db.Companies.Remove(company);
        _db.SaveChanges();
        return;
    }
}