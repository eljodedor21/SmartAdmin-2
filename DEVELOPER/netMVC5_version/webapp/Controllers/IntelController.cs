#region Using

using System.Web.Mvc;

#endregion

namespace SmartAdminMvc.Controllers
{
    public class IntelController : Controller
    {
        // GET: /intel/settings
        public ActionResult Settings()
        {
            return View();
        }

        // GET: /intel/versions
        public ActionResult Versions()
        {
            return View();
        }
    }
}