<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver__infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('driver_type_id');
            $table->foreign('driver_type_id')->references('id')->on('driver__types');
            $table->string('driver_name');
            $table->string('driver_code');
            $table->string('driver_phone_1');
            $table->string('driver_phone_2');
            $table->string('license_no');
            $table->dateTime('license_validity_to');
            $table->string('license_copy_front');
            $table->string('license_copy_back');
            $table->tinyInteger('license_validity_status')->default(1)->comment('1 - Active, 0 - De-active');
            $table->string('driver_address');
            $table->string('driver_photo');
            $table->string('aadhar_card');
            $table->string('pan_card');
            $table->tinyInteger('driver_status')->default(1)->comment('1 - Active, 0 - De-active, 2 - Soft delete ');
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
        Schema::dropIfExists('driver__infos');
    }
}
