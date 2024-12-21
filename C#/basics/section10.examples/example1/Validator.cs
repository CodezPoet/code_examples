using System.ComponentModel.DataAnnotations;
using System.Reflection;

namespace c_course_cont.section10.examples.example1;

// there is no reason to make this static except to call it without creating object for the example
public static class Validator
{
    public static void Validate<T>(T data) where T : class
    {
        Type t = data.GetType();
        FieldInfo[] pi = t.GetFields();

        foreach (FieldInfo p in pi)
        {
            var attributes = p.GetCustomAttributesData();
            foreach (var att in attributes)
            {
                if (att.AttributeType.Name == "NonNegative")
                    if (Convert.ToInt32(p.GetValue(data)) < 0)
                        throw new ArgumentException(p.Name + " has a NonNegative property with a value < 0.");
            }
        }
    }
}