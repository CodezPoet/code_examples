namespace c_course_cont.section7.examples.example5;

public class ReturnExample
{
    public List<Object> SomeMethod()
    {
        List<Object> list = new List<Object>();
        list.Add("hello");
        list.Add(10);
        list.Add(34.5);
        list.Add(true);
        return list;
    } 
}