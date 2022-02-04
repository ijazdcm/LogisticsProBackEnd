<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle__infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_type_id');
            $table->foreign('vehicle_type_id')->references('id')->on('vehicle__types');
            $table->string('vehicle_number')->unique();
            $table->unsignedBigInteger('vehicle_capacity_id');
            $table->foreign('vehicle_capacity_id')->references('id')->on('vehicle__capacities');
            $table->unsignedBigInteger('vehicle_body_type_id');
            $table->foreign('vehicle_body_type_id')->references('id')->on('vehicle__body__types');
            $table->string('rc_copy_front')->nullable()->default(null);
            $table->string('rc_copy_back')->nullable()->default(null);
            $table->string('insurance_copy_front')->nullable()->default(null);
            $table->string('insurance_copy_back')->nullable()->default(null);
            $table->date('insurance_validity')->nullable()->default(null);
            $table->date('fc_validity')->nullable()->default(null);
            $table->tinyInteger('vehicle_status')->default(1)->comment('1 - Active, 0 - In-Active');
            $table->tinyInteger('vehicle_is_assigned')->default(0)->comment('1 - Assigned, 0 -Not Assigned');
            $table->unsignedBigInteger('created_by')->nullable()->default(null);
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
        Schema::dropIfExists('vehicle__infos');
    }
}
