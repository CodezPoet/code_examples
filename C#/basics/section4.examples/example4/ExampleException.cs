namespace c_course_cont.section4.examples.example4;

// Exception handling example
public class ExampleException
{
    public static void MainExample()
    {
        int[] d = new int[3];
        int a = 10;
        int b = 0;
        int c = 0;

        try
        {
            //  c = a / b;
            //   d[10] = 10;
            return;
        }
        catch (IndexOutOfRangeException e)
        {
            Console.WriteLine("Do something: " + e.Message);
        }
        catch (DivideByZeroException e)
        {
            Console.WriteLine("Do something different: " + e.Message);
        }
        catch (Exception e)
        {
            Console.WriteLine("Some error occured");
            Console.WriteLine("Standard message: " + e);
            Console.WriteLine("Message: " + e.Message);
            Console.WriteLine("StackTrace: " + e.StackTrace);
            Console.WriteLine("Target site: " + e.TargetSite);
            Console.WriteLine("Source: " + e.Source);
        }
        finally
        {
            Console.WriteLine("Will always run");
        }

        Console.WriteLine("May not run if method returns or runtime exception");
    }
}