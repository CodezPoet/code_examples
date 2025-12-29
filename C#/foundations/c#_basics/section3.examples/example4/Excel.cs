using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace c_course_cont.section3.examples.example4
{
    public class Excel : IOffice
    {
        public void New()
        {
            Console.WriteLine("Create excel doc");
        }

        public void Save()
        {
            Console.WriteLine("Save excel doc");
        }

        public void Print()
        {
            Console.WriteLine("Print excel doc");
        }

    }
}