<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('delivery_requests', function (Blueprint $table) {
        $table->id();
        $table->string('pickup_address')->nullable();
        $table->string('pickup_name')->nullable();
        $table->string('pickup_contact_no')->nullable();
        $table->string('pickup_email')->nullable();
        $table->string('delivery_address')->nullable();
        $table->string('delivery_name')->nullable();
        $table->string('delivery_contact_no')->nullable();
        $table->string('delivery_email')->nullable();
        $table->enum('type_of_good', ['Document', 'Parcel']);
        $table->enum('delivery_provider', ['DHL', 'STARTRACK', 'ZOOM2U', 'TGE']);
        $table->enum('priority', ['Standard', 'Express', 'Immediate']);
        $table->date('shipment_pickup_date')->nullable();
        $table->time('shipment_pickup_time')->nullable();
        $table->text('package_description')->nullable();
        $table->float('length')->nullable();
        $table->float('height')->nullable();
        $table->float('width')->nullable();
        $table->float('weight')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_requests');
    }
};
