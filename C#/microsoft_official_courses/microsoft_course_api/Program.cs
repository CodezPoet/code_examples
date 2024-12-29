using Microsoft.AspNetCore.Http.HttpResults;
using Microsoft.AspNetCore.Rewrite;

var builder = WebApplication.CreateBuilder(args);

// Register Depency Injection Container 
builder.Services.AddSingleton<ITaskService>(new InMemoryTaskService());

var app = builder.Build();
var todos = new List<ToDo>();

// Rewrite URL
app.UseRewriter(new RewriteOptions().AddRedirect("tasks/(.*)", "todos/$1"));

// Custom Middleware
app.Use(async (context, next) =>
{
    Console.WriteLine($"[{context.Request.Method} {context.Request.Path} {DateTime.UtcNow}] Started.");
    await next(context);
    Console.WriteLine($"[{context.Request.Method} {context.Request.Path}  {DateTime.UtcNow}] Finished.");
});

// API 
app.MapGet("/todos", (ITaskService service) => service.GetToDos());

app.MapGet("todos/{id}", Results<Ok<ToDo>, NotFound> (int id, ITaskService service) =>
{
    var targetToDo = service.GetToDoById(id);
    return targetToDo is null ?
    TypedResults.NotFound()
    : TypedResults.Ok(targetToDo);
});

// Endpoint Filters in the API
app.MapPost("/todos", (ToDo task, ITaskService service) =>
{
    service.AddToDo(task);
    return TypedResults.Created("/todos/{id}", task);
})
.AddEndpointFilter(async (context, next) =>
{
    var taskArgument = context.GetArgument<ToDo>(0);
    var errors = new Dictionary<string, string[]>();
    if (taskArgument.DueDate < DateTime.UtcNow)
    {
        errors.Add(nameof(ToDo.DueDate), ["Cannot have due date in the past."]);
    }
    if (taskArgument.isCompleted)
    {
        errors.Add(nameof(ToDo.isCompleted), ["Cannot add completed todo."]);
    }

    if (errors.Count > 0)
    {
        return Results.ValidationProblem(errors);
    }

    return await next(context);
});

app.MapDelete("/todos/{id}", (int id, ITaskService service) =>
{
    service.DeleteToDoById(id);
    return TypedResults.NoContent();
});

app.Run();

// Record for demo
public record ToDo(int Id, string Name, DateTime DueDate, bool isCompleted);

// Interface
interface ITaskService
{
    ToDo? GetToDoById(int id);
    List<ToDo> GetToDos();
    void DeleteToDoById(int id);
    ToDo AddToDo(ToDo task);
}

// Class using Interface (can easily be changed to a InDatabaseTaskService for example while still working because the decoupling)
class InMemoryTaskService : ITaskService
{
    private readonly List<ToDo> _todos = [];

    public ToDo AddToDo(ToDo task)
    {
        _todos.Add(task);
        return task;
    }

    public void DeleteToDoById(int id)
    {
        _todos.RemoveAll(task => id == task.Id);
    }

    public ToDo? GetToDoById(int id)
    {
        return _todos.SingleOrDefault(t => id == t.Id);
    }

    public List<ToDo> GetToDos()
    {
        return _todos;
    }
}