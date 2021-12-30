<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleBodyTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle__body__types', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_body_type');
            $table->tinyInteger('vehicle_body_type_status')->default(1)->comment('1 - Active, 0 - In-Active');
            $table->unsignedBigInteger('created_by')->default(null);
            $table->softDeletes();
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
        Schema::dropIfExists('vehicle__body__types');
    }
}
