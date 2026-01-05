<?php

declare(strict_types=1);

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
        Schema::create('recurring_transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('source_id')->constrained('wallets');
            $table->foreignId('target_id')->constrained('wallets');
            $table->datetime('start_date');
            $table->datetime('end_date')->nullable();
            $table->integer('frequency')->default(1);
            $table->integer('amount')->unsigned();
            $table->string('reason');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recurring_transfers');
    }
};
