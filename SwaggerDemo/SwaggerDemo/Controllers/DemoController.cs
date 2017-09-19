using System;
using System.Collections.Generic;
using System.Linq;
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

        // GET api/values
        [HttpGet]
        public IEnumerable<DemoModel> Get()
        {
            return _models;
        }

        // GET api/values/5
        [HttpGet("{id}")]
        public IActionResult Get(int id)
        {
            var model = _models.FirstOrDefault(_ => _.Id == id);
            if (model == null)
                return NotFound();
            return Ok(model);
        }
    }
}
