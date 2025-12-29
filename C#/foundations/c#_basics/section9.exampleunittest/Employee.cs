namespace c_course_cont.section9.exampleunittest
{
    public class Employee
    {
        public decimal Salary { get; private set; }
        public decimal Bonus { get; private set; }

        public Employee(decimal salary)
        {
            if (salary <= 0) throw new ArgumentException("Salary cannot be 0 or -ve");
            this.Salary = salary;
            this.Bonus = this.Salary * .20m;
        }

        public decimal CalculateTotalPay()
        {
            return Salary + Bonus;
        }

        public decimal CalculateTotalPay(decimal salary, decimal bonus)
        {
            return salary + bonus;
        }
    }
}