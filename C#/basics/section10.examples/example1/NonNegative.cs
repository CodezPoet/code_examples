namespace c_course_cont.section10.examples.example1;

// Add inheritance to the class with Attribute. Can be applied to Classes, Methods, and Properties

[AttributeUsage(AttributeTargets.Property | AttributeTargets.Field)]
public class NonNegative : Attribute
{
}