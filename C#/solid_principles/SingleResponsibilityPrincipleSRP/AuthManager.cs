namespace SolidPrinciples.SingleResponsibilityPrincipleSRP
{
    public class AuthManager
    {
        public void Login()
        {
            // Responsible for logging in the user
        }

        public void Logout()
        {
            // Responsible for logging out the user
        }

        public Boolean IsCurrentUserAuthenticated()
        {
            //  Responsible for whether the current user is authenticated or not
        }

        public Employee GetCurrentLoggedInUser()
        {
            // Responsible for getting the current logged in user details
        }
    }
}