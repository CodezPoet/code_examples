namespace c_course_cont.section10.examples.example1;

public class ValueRange : Attribute
{
    // If you want your attribute to take in parameters, make properties for them
    public int MinValue { get; set; }
    public int MaxValue { get; set; }

    public ValueRange(int minValue, int maxValue)
    {
        this.MinValue = minValue;
        this.MaxValue = maxValue;
    }
}