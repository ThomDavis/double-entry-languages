namespace MvcMovie.Models;

public class LedgerEntity
{
    public int Id { get; set; }
    public DateTime CreatedAt { get; set; }
    public DateTime UpdatedAt { get; set; }
    public int LedgerId { get; set; }
    public Ledger Ledger { get; set; }
}