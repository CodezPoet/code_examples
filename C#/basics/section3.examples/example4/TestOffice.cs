using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace c_course_cont.section3.examples.example4
{
    public class TestOffice
    {
        public static void MainExample() {
            IOffice obj = new Word();
            obj.Save();
            obj.Insert();

            IOffice obj2 = new Excel();
            obj2.Save();
            obj2.Insert();
        } 
    }
}