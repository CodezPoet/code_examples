using System.Text;
using System.Threading.Tasks;

namespace c_course_cont.section1.examples;

// My first program
public class ExampleOne
{
    /*
     * Multiline Comment
     */
    public static void MainExample()
    {
        Console.WriteLine("Hello World!");

        int x = 10;
        int y = 4;
        int result = x % y;

        Console.WriteLine("result = " + result);

        Console.WriteLine("{0} + {1} = {2}", x, y, (x + y));
    }
}