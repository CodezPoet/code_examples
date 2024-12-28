using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace c_course_cont.section3.examples.example4
{
    public interface IOffice
    {
        void New();
        void Save();
        void Print();

        void Insert()
        {
            Console.WriteLine("Insert Method");
        }
    }
}