﻿// <auto-generated />
using System;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Infrastructure;
using Microsoft.EntityFrameworkCore.Migrations;
using Microsoft.EntityFrameworkCore.Storage.ValueConversion;
using MvcMovie.Data;

#nullable disable

namespace MvcMovie.Migrations
{
    [DbContext(typeof(DataContext))]
    [Migration("20241203172039_changingdates2")]
    partial class changingdates2
    {
        /// <inheritdoc />
        protected override void BuildTargetModel(ModelBuilder modelBuilder)
        {
#pragma warning disable 612, 618
            modelBuilder.HasAnnotation("ProductVersion", "9.0.0");

            modelBuilder.Entity("MvcMovie.Models.Ledger", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("INTEGER");

                    b.Property<int>("AssetsBalance")
                        .HasColumnType("INTEGER");

                    b.Property<DateTime>("CheckoutAt")
                        .HasColumnType("TEXT");

                    b.Property<string>("CheckoutResource")
                        .IsRequired()
                        .HasColumnType("TEXT");

                    b.Property<TimeSpan>("CreatedAt")
                        .HasColumnType("TEXT");

                    b.Property<int>("LiabilitiesBalance")
                        .HasColumnType("INTEGER");

                    b.Property<string>("Name")
                        .IsRequired()
                        .HasColumnType("TEXT");

                    b.Property<DateTime>("UpdatedAt")
                        .HasColumnType("Date");

                    b.HasKey("Id");

                    b.ToTable("Ledgers");
                });

            modelBuilder.Entity("MvcMovie.Models.LedgerEntity", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("INTEGER");

                    b.Property<DateTime>("CreatedAt")
                        .HasColumnType("TEXT");

                    b.Property<int>("LedgerId")
                        .HasColumnType("INTEGER");

                    b.Property<DateTime>("UpdatedAt")
                        .HasColumnType("TEXT");

                    b.HasKey("Id");

                    b.HasIndex("LedgerId");

                    b.ToTable("LedgerEntity");
                });

            modelBuilder.Entity("MvcMovie.Models.LedgerEntity", b =>
                {
                    b.HasOne("MvcMovie.Models.Ledger", "Ledger")
                        .WithMany("LedgerEntities")
                        .HasForeignKey("LedgerId")
                        .OnDelete(DeleteBehavior.Cascade)
                        .IsRequired();

                    b.Navigation("Ledger");
                });

            modelBuilder.Entity("MvcMovie.Models.Ledger", b =>
                {
                    b.Navigation("LedgerEntities");
                });
#pragma warning restore 612, 618
        }
    }
}
