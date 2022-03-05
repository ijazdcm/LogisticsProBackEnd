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
            $table->unsignedBigInteger('driver_id')->nullable()->default(null);
            $table->foreign('driver_id')->references('id')->on('driver__infos');
            $table->string('maintenance_typ');
            $table->string('maintenance_by');
            $table->string('work_order')->nullable()->default(null);
            $table->string('vendor_id')->nullable()->default(null);
            $table->string('opening_odometer_km')->nullable()->default(null);
            $table->string('closing_odometer_km')->nullable()->default(null);
            $table->date('maintenance_start_datetime')->nullable()->default(null);
            $table->date('maintenance_end_datetime')->nullable()->default(null);
            $table->tinyInteger('vehicle_maintenance_status');
            $table->string('remarks')->nullable()->default(null);
            $table->unsignedBigInteger('created_by')->default(0);
//             $table->string('work_order');

//             $table->tinyInteger('vendor_id');
//             $table->string('closing_km')->default(null);
//             $table->string('closing_km_photo')->default(null);
//             $table->timestamp('maintenance_start_datetime')->useCurrent();
//             $table->timestamp('maintenance_end_datetime')->useCurrent();
//             $table->string('remarks');
//             $table->unsignedBigInteger('created_by')->default(null);

//             $table->string('vendor_id');
//             $table->string('closing_odometer_km')->nullable();
//             $table->date('maintenance_start_datetime')->nullable()->default(null);
//             $table->date('maintenance_end_datetime')->nullable()->default(null);
//             $table->string('remarks')->nullable()->default(null);
//             $table->unsignedBigInteger('created_by')->default(0);


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
