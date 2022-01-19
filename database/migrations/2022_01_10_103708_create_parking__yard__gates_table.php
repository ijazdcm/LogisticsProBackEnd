<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingYardGatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking__yard__gates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_type_id');
            $table->foreign('vehicle_type_id')->references('id')->on('vehicle__types');
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicle__infos');
            $table->unsignedBigInteger('driver_id');
            $table->foreign('driver_id')->references('id')->on('driver__infos');
            $table->string('odometer_km');
            $table->string('odometer_photo');
            $table->string('vehicle_number');
            $table->tinyInteger('vehicle_capacity_id');
            $table->string('driver_name');
            $table->string('driver_contact_number');
            $table->unsignedBigInteger('vehicle_body_type_id');
            $table->foreign('vehicle_body_type_id')->references('id')->on('vehicle__body__types');
            $table->string('party_name')->default("null");
            $table->text('remarks');
            $table->string('parking_status')->default(null)->comment('Waiting Outside, Gate In, Gate Out');
            $table->timestamp('gate_in_date_time')->useCurrent();
            $table->timestamp('gate_out_date_time')->useCurrent();
            $table->unsignedBigInteger('created_by')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parking__yard__gates');
    }
}
