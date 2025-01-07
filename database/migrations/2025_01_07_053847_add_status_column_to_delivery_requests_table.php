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
        Schema::table('delivery_requests', function (Blueprint $table) {
            $table->enum('status', ['Pending', 'Processed', 'Shipped', 'Cancelled'])->default('Pending')->after('weight');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('delivery_requests', function (Blueprint $table) {
            //
        });
    }
};
