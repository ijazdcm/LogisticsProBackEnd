<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleInspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle__inspections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicle__infos');
            $table->tinyInteger('truck_clean');
            $table->tinyInteger('bad_smell');
            $table->tinyInteger('insect_vevils_presence');
            $table->tinyInteger('tarpaulin_srf');
            $table->tinyInteger('tarpaulin_non_srf');
            $table->tinyInteger('insect_vevils_presence_in_tar');
            $table->tinyInteger('truck_platform');
            $table->tinyInteger('previous_load_details');
            $table->tinyInteger('vehicle_fit_for_loading');
            $table->string('remarks');
            $table->tinyInteger('vehicle_inspection_status');
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
        Schema::dropIfExists('vehicle__inspections');
    }
}
