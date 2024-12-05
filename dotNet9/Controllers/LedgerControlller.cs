using Microsoft.AspNetCore.Mvc;
using MvcMovie.Services;

namespace MvcMovie.Controllers;

public class LedgerController : Controller
{
    private readonly LedgerService _ledgerService;

    public LedgerController(LedgerService ledgerService)
    {
        _ledgerService = ledgerService;
    }
    public ActionResult Parse()
    {
        // do the logic here.
        
        _ledgerService.Parse();

        return Ok("Awesome");
    }
}