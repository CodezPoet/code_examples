namespace c_course_cont.section8.examples.example2;

public class ReadFile
{
    public static void MainExample()
    {
        String line;
        try
        {
            // Pass the fle path and file name to the StreamReader constructor
            StreamReader sr = new StreamReader("Test.txt");
            // Read the first line of text
            line = sr.ReadLine();
            // Continue to read until you reach end of file
            while (line != null)
            {
                // Write the line to the console window
                Console.WriteLine(line);
                // Read the nex line
                line = sr.ReadLine();
            }

            // Close the file
            sr.Close();
        }
        catch (Exception e)
        {
            Console.WriteLine("Exception: " + e.Message);
        }
    }
}