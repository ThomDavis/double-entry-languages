using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace MvcMovie.Models;

public class Ledger
{
    public int Id { get; set; }
    public TimeSpan CreatedAt { get; set; }
    [DataType(DataType.Date)]
    [Column(TypeName = "Date")]
    public DateTime UpdatedAt { get; set; }
    public string Name { get; set; } = string.Empty;
    public int AssetsBalance { get; set; }
    public int LiabilitiesBalance { get; set; }
    public string CheckoutResource { get; set; } = string.Empty;
    public DateTime CheckoutAt { get; set; }
    public List<LedgerEntity> LedgerEntities { get; set; }

}