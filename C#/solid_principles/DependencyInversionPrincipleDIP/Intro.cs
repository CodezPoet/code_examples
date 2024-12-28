using System;
using Unity;

namespace SolidPrinciples.DependencyInversionPrincipleDIP
{
    public class Intro
    {
        public static void MainExample()
        {
            IUnityContainer unityContainer= new UnityContainer();
            unityContainer.RegisterType<ILogger,FileLogger>();
            unityContainer.RegisterType<ILogger,DatabaseLogger>();

            Employee employee = unityContainer.Resolve<Employee>();
            employee.Save(employee);
        
            Console.Read();
        }
    }
}
