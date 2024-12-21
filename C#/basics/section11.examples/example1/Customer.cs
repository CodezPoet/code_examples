namespace c_course_cont.section11.examples.example1;

public class Customer
{
    public int CustomerId { get; set; }

    public ILogger log { get; set; }

    public void PrintInvoice()
    {
        // code to print invoice
        log.Info("Customer print invoice log");
    }
}