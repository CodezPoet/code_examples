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
    // Class is only responsible for handling Journal entry
    public class Journal
    {
        private readonly List<string> entries = new List<string>();

        private static int count = 0;

        // Adds a new entry to the journal
        public int AddEntry(string text)
        {
            entries.Add($"{++count}: {text}");
            return count; // Memento
        }

        // Removes an entry from the journal based on the provided index
        public void RemoveEntry(int index)
        {
            entries.RemoveAt(index);
        }

        // Returns a string representation of the journal entries
        public override string ToString()
        {
            return string.Join(Environment.NewLine, entries);
        }
    }

    // Separation of concerns. Saving file in another class instead of the Journal class
    // Following the Single Responsibility Principle
    public class Persistence
    {
        // Saves the journal entries to a file
        public void SaveToFile(Journal j, string filename, bool overwrite = false)
        {
            if (overwrite || !File.Exists(filename))
            {
                File.WriteAllText(filename, j.ToString());
            }
        }
    }

    // Run demo code
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

            // Save journal entries to file
            p.SaveToFile(j, filename, true);

            // Open the text file with the default text editor
            Process.Start("notepad.exe", filename);
        }
    }
}
