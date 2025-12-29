using System.Runtime.Serialization.Formatters;

namespace CourseExcercises.Projects.IterationLoopsProject
{
    public class ForLoops
    {
        public static void MainExample()
        {
            for (int i = 0; i < 10; i++)
            {
                Console.WriteLine(i);
            }

            Console.WriteLine("--------------------------------------------");

            for (int i = 10; i >= 0; i--)
            {
                Console.WriteLine(i);
            }

            Console.WriteLine("--------------------------------------------");

            for (int i = 0; i < 10; i += 3)
            {
                Console.WriteLine(i);
            }

            Console.WriteLine("--------------------------------------------");

            for (int i = 0; i < 10; i++)
            {
                Console.WriteLine(i);
                if (i == 7) break;
            }


            Console.WriteLine("--------------------------------------------");

            string phrase = "Reverse me";
            char[] stringToReverse = phrase.ToCharArray();

            for (int i = stringToReverse.Length - 1; i >= 0; i--)
            {
                Console.WriteLine(stringToReverse[i]);
            }

            Console.WriteLine("--------------------------------------------");

            string[] names = { "Alex", "Eddie", "David", "Michael" };

            for (int i = names.Length - 1; i >= 0; i--)
            {
                Console.WriteLine(names[i]);
            }

            for (int i = 0; i < names.Length; i++)
            {
                Console.WriteLine(names[i]);
            }

            /*
              Updating value in the array during a foreach loop
            */

            // Can't do this:
            // foreach (var name in names) {
            //     if (name == "David") {
            //         name = "Sammy";
            //     }
            // }

            // Do this instead:
            for (int i = 0; i < names.Length; i++)
            {
                if (names[i] == "David") names[i] = "Sammy";
            }

            foreach (var name in names)
            {
                Console.WriteLine(name);
            }
            
            Console.WriteLine("--------------------------------------------");
        }
    }
}
