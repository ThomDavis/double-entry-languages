using Microsoft.AspNetCore.Mvc;
using MvcMovie.Services;

namespace MvcMovie.Controllers;

public class LedgersController : Controller
{
    private readonly LedgerService _ledgerService;

    public LedgersController(LedgerService ledgerService)
    {
        _ledgerService = ledgerService;
    }
    
    public ActionResult Index()
    {
        // do the logic here.
        
        // _ledgerService.Parse();

        // return a list of ledgers
        
        return Ok("Awesome");
    }
    
    [HttpGet("{id}")]   // GET /ledgers/id
    public JsonResult GetProduct(string id)
    {
        return Json(_ledgerService.FetchLedger(id));
    }
    
    public ActionResult Parse()
    {
        // do the logic here.
        
        _ledgerService.Parse();

        return Ok("Awesome");
    }
}