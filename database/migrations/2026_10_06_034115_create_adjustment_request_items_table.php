<?php

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
        Schema::create('adjustment_request_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('adjustment_request_id')
                ->constrained('adjustment_requests')
                ->cascadeOnDelete();

            $table->string('old_sku');
            $table->string('new_sku');

            $table->unsignedInteger('old_quantity');
            $table->unsignedInteger('new_quantity');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adjustment_request_items');
    }
};
