using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.IO;
using static System.Console;

// Important: These code examples are not for production use
// and meant as demo showcase to show understanding of design principles, 
// They may include things such as use of public fields (which is not recommended for production use), and
// the principle example is shown in a single file, for things like ease of readibility

namespace DesignPatterns
{
    public class Journal
    {
        private readonly List<string> entries = new List<string>();

        private static int count = 0;

       public int AddEntry(string text)
        {
            entries.Add($"{++count}: {text}");
            return count; // Memento
        }

       public void RemoveEntry(int index)
        {
            entries.RemoveAt(index);
        }

        public override string ToString()
        {
            return string.Join(Environment.NewLine, entries);
        }
    }

    public class Persistence
    {
        public void SaveToFile(Journal j, string filename, bool overwrite = false)
        {
            if (overwrite || !File.Exists(filename))
            {
                File.WriteAllText(filename, j.ToString());
            }
        }
    }

    public class Demo
    {
        static void Main(string[] args)
        {
            var j = new Journal();
            j.AddEntry("I crushed a bug");
            j.AddEntry("I had a cookie today");
            WriteLine(j);
      
            var p = new Persistence();
            var filename = @"c:\temp\journal.txt";
            p.SaveToFile(j, filename, true);
            Process.Start("notepad.exe", filename);
        }
    }
}
