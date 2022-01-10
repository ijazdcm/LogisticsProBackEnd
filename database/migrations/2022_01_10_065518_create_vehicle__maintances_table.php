<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleMaintancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle__maintances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicle__infos');
            $table->unsignedBigInteger('driver_id');
            $table->foreign('driver_id')->references('id')->on('driver__infos');
            $table->string('maintenance_typ');
            $table->string('maintenance_by');
            $table->string('work_order');
            $table->tinyInteger('vendor_id');
            $table->timestamp('maintenance_start_datetime')->useCurrent();
            $table->timestamp('maintenance_end_datetime')->useCurrent();
            $table->string('remarks');
            $table->unsignedBigInteger('created_by')->default(null);
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
        Schema::dropIfExists('vehicle__maintances');
    }
}
