<?php

use App\Models\Ledger;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->integer('assets_balance')->default(0);
            $table->integer('liabilities_balance')->default(0);
            $table->string('checkout_resource')->nullable();
            $table->timestamp('checkout_at')->nullable();
        });

        Schema::create('ledger_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ledger_id')->nullable()->index();
            $table->integer('assets_balance')->default(0);
            $table->integer('liabilities_balance')->default(0);
            $table->timestamps();
            $table->string('created_resource')->nullable();
            $table->string('status')->nullable();
            $table->string('status_message')->nullable();
        });

        Schema::create('ledger_entry_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('ledger_id')->nullable()->index();
            $table->foreignId('ledger_entry_id')->nullable()->index();
            $table->string('created_resource')->nullable();
            $table->integer('asset_amount')->nullable();
            $table->integer('liability_amount')->nullable();
            $table->string('description')->nullable();
        });

        Ledger::firstOrCreate(['name' => 'laravel']);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ledgers');
        Schema::dropIfExists('ledger_entries');
        Schema::dropIfExists('ledger_entry_items');
    }
};
