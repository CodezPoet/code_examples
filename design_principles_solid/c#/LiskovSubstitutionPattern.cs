using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using static System.Console;

// Important: These code examples are not for production use
// and meant as demo showcase to show understanding of design principles, 
// They may include things such as use of public fields (which is not recommended for production use), and
// the principle example is shown in a single file, for things like ease of readibility
// Code example is worked out homework fromm the course: Design Patterns in C# en .Net,
// Link course: https://www.udemy.com/course/design-patterns-csharp-dotnet/

namespace DesignPatterns
{
    public class Rectangle
    {
        public virtual int Width { get; set; }
        public virtual int Height { get; set; }

        public Rectangle()
        {

        }

        public Rectangle(int width, int height)
        {
            Width = width;
            Height = height;
        }

        public override string ToString()
        {
            return ($"{nameof(Width)}: {Width}, {nameof(Height)}: {Height}");
        }

        public class Square : Rectangle
        {
            public override int Width
            {
                set
                {
                    base.Width = base.Height = value;
                }
            }

            public override int Height
            {
                set
                {
                    base.Width = base.Height = value;
                }
            }
         
        }
        public class Demo
        {
            static public int Area(Rectangle r) => r.Width * r.Height;
            static void Main(string[] args)
            {
                Rectangle rc = new Rectangle(2, 3);
                WriteLine($"{rc} has area {Area(rc)}");

                Rectangle sq = new Square();
                sq.Width = 4;
                WriteLine($"{sq} has area {Area(sq)}");
            }
        }
    }
}
