using System.Reflection;

namespace c_course_cont.section10.examples.example1;

public class ValueValidator
{
    public static void Validate<T>(T data) where T : class
    {
        Type t = data.GetType();
        FieldInfo[] pi = t.GetFields();

        foreach (FieldInfo p in pi)
        {
            var attributes = p.GetCustomAttributes();

            foreach (var att in attributes)
            {
                ValueRange br = att as ValueRange;
                if (br != null)
                {
                    if (Convert.ToInt32(p.GetValue(data)) < br.MinValue ||
                        Convert.ToInt32(p.GetValue(data)) > br.MaxValue)
                    {
                        throw new ArgumentException(p.Name + " has a value out of range");
                    }
                }
            }
        }
    }
}