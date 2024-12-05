using Microsoft.EntityFrameworkCore;
using MvcMovie.Models;

namespace MvcMovie.Data;

public class DataContext : DbContext
{
    public DataContext(DbContextOptions options) : base(options)
    {
    }
    
    public DbSet<Ledger> Ledgers { get; set; }
    // DbSet<LedgerEntity> LedgersEntities { get; set; }
    // DbSet<LedgerEntityItem> LedgersEntityItem { get; set; }
}