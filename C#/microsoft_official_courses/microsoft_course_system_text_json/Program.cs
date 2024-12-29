using System.Diagnostics.CodeAnalysis;
using System.Security.Principal;
using System.Text.Json;
using System.Text.Json.Serialization;

var fileName = "/workspaces/MicrosoftCourseJson/MicrososftCourseJson/weatherForecast.json";
var fileName2 = "/workspaces/MicrosoftCourseJson/MicrososftCourseJson/weatherForecastNonPureData.json";
var fileName3 = "/workspaces/MicrosoftCourseJson/MicrososftCourseJson/weatherForecastWind.json";
var fileName4 = "/workspaces/MicrosoftCourseJson/MicrososftCourseJson/weatherForecastWindSpeed.json";

/// Some example data
var weatherForecast = new WeatherForecast1
{
   Date = DateTime.Parse("2023-11-27"),
   TemperatureCelsius = 2,
   Summary = "Cold"
};

/// Serialize example
var jsonString = JsonSerializer.Serialize(weatherForecast);
File.WriteAllText(fileName, jsonString);

/// Write to file example
using FileStream createStream = File.Create(fileName);
await JsonSerializer.SerializeAsync(createStream, weatherForecast);
await createStream.DisposeAsync();

/// Deserialize example
var jsonString = """{"Date":"2023-12-27T00:00:00+00:00","TemperatureCelsius":38,"Summary":"Really Hot"}""";
weatherForecast = JsonSerializer.Deserialize<WeatherForecast1>(jsonString);

/// Read from file example Option 1
var jsonString = File.ReadAllText(fileName);
JsonSerializer.Deserialize<WeatherForecast1>(jsonString);

/// Read from file example Option 2
using FileStream openStream = File.OpenRead(fileName);
weatherForecast = await JsonSerializer.DeserializeAsync<WeatherForecast1>(openStream);

/// Non pure JSON data example
var jsonString = File.ReadAllText(fileName2);

var options = new JsonSerializerOptions 
{
    AllowTrailingCommas = true,
    ReadCommentHandling = JsonCommentHandling.Skip,
    NumberHandling = JsonNumberHandling.AllowReadingFromString // | JsonNumberHandling.WriteAsString
};

var weather = JsonSerializer.Deserialize<WeatherForecast1>(jsonString, options);

/// Example when JSON doesn't have value that is in  Class (using strict or non strict)
var jsonString = File.ReadAllText(fileName3);
var weather = JsonSerializer.Deserialize<WeatherForecast2>(jsonString);

/// Example Defaults for JSON in Web Apps
var jsonString = File.ReadAllText(fileName3);
var option = new JsonSerializerOptions(JsonSerializerDefaults.Web)
{
    WriteIndented = true
};
// var options = new JsonSerializerOptions
// {
//     PropertyNameCaseInsensitive = true,
//     PropertyNamingPolicy = JsonNamingPolicy.CamelCase,
//     NumberHandling = JsonNumberHandling.AllowReadingFromString
// };
var weather = JsonSerializer.Deserialize<WeatherForecast3>(jsonString);

/// Enabling Case insensitive
var jsonString = File.ReadAllText(fileName3);
var options = new JsonSerializerOptions()
{
    PropertyNameCaseInsensitive = true
};
var weather = JsonSerializer.Deserialize<WeatherForecast3>(jsonString,options);

/// Ignoring properties when reading & writing JSON
var weatherForecast4 = new WeatherForecast4
{
    Date = DateTime.Now,
    Summary = null,
    TemperatureCelsius = default,
    WindSpeed = 10
};

var options = new JsonSerializerOptions()
{
    WriteIndented = true,
    IgnoreReadOnlyProperties = true,
    // Can put here or in the Class, see Class for example
    // Note that options put in the class are combined in these options
    DefaultIgnoreCondition = JsonIgnoreCondition.WhenWritingDefault & JsonIgnoreCondition.WhenWritingNull
};

var jsonString = JsonSerializer.Serialize(weatherForecast4, options);

//// Working with fields when reading & writing JSON
var weatherForecast6 = new WeatherForecast6
{
    Date = DateTime.Parse("2023-11-27"),
    TemperatureCelsius = 2,
    Summary = "Cold"
};

var options = new JsonSerializerOptions()
{
    WriteIndented = true,
    IncludeFields = true,
};

var jsonString = JsonSerializer.Serialize(weatherForecast6, options);

/// Example Classes
public class WeatherForecast1
{
    public DateTimeOffset Date { get; set; }
    public int TemperatureCelsius { get; set; }
    public string? Summary { get; set; }
}

[JsonUnmappedMemberHandling(JsonUnmappedMemberHandling.Disallow)]
public class WeatherForecast2
{

    public DateTimeOffset Date { get; set; }
    public int TemperatureCelsius { get; set; }
    public string? Summary { get; set; }

    public int Wind { get; set; }
}

public class WeatherForecast3
{

    public DateTimeOffset Date { get; set; }
    public int TemperatureCelsius { get; set; }
    public string? Summary { get; set; }

    public int Wind { get; set; }
}

public class WeatherForecast4
{
    [JsonIgnore(Condition = JsonIgnoreCondition.WhenWritingDefault)]
    public DateTimeOffset Date { get; set; }

    [JsonIgnore(Condition = JsonIgnoreCondition.Never)]
    public int TemperatureCelsius { get; set; }

    // [JsonIgnore]
    [JsonIgnore(Condition = JsonIgnoreCondition.WhenWritingNull)]
    public string? Summary { get; set; }

    public int WindSpeed { get; set; }

    public int WindSpeedReadOnly { get; private set; } = 35;
}

public class WeatherForecast6
{
    public DateTimeOffset Date { get; set; }
    public int TemperatureCelsius { get; set; }

    public string? Summary { get; set; }

    // required value for JSON
    public required int Wind { get; set; }
}