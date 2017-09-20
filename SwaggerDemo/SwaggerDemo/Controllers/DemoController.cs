using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;

namespace SwaggerDemo.Controllers
{
    public class DemoModel
    {
        public int Id { get; set; }
        public string Text { get; set; }
    }

    [Route("api/[controller]")]
    public class DemoController : Controller
    {
        private static readonly DemoModel[] _models = {
            new DemoModel {Id = 1, Text = "Hi Mississauga .NET User Group!"},
            new DemoModel {Id = 2, Text = "Demo by Dave van Herten"}
        };

        /// <summary>
        /// Get lots of things!
        /// </summary>
        /// <remarks>
        /// REMARKS are awesome because they become implementation notes!
        ///     
        ///     {
        ///         "WithSome": "Tab support for code blocks!"
        ///     }
        /// 
        /// Documentation power at your fingertips!
        /// </remarks>
        [HttpGet]
        [Produces("application/json")]
        [ProducesResponseType(typeof(IEnumerable<DemoModel>), (int)HttpStatusCode.OK)]
        public IEnumerable<DemoModel> Get()
        {
            return _models;
        }

        /// <summary>
        /// Get one thing!
        /// </summary>
        [HttpGet("{id}")]
        [Produces("application/json")]
        [ProducesResponseType(typeof(DemoModel), (int)HttpStatusCode.OK)]
        [ProducesResponseType((int)HttpStatusCode.NotFound)]
        public IActionResult Get(int id)
        {
            var model = _models.FirstOrDefault(x => x.Id == id);
            if (model == null)
                return NotFound();
            return Ok(model);
        }
    }
}
