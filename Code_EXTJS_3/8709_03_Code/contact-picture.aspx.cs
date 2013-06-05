using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace ExtJSCookBook.Chapter_3
{
    public partial class contact_picture : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            if (null == Request.Form["act"]) return;

            if (Request.Form["act"].Equals("getPicture"))
            {

                Response.ContentType = "text/x-json";
                Response.Write("{success:true,data:{contactId:'contact1',file:'img/jorger.jpg'}}");
                Response.End();
            }

            if (Request.Form["act"].Equals("setPicture"))
            {

                Response.ContentType = "text/html";
                Response.Write("{success:true,data:{contactId:'contact1',file:'img/" + Request.Files[0].FileName + "'}}");
                Response.End();
            }
        }
    }
}
