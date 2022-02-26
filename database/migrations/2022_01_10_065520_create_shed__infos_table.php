<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShedInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shed__infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shed_type_id')->nullable()->default(null);;
            $table->foreign('shed_type_id')->references('id')->on('shed__types');
            $table->string('shed_name');
            $table->string('shed_owner_name');
            $table->string('shed_owner_phone_1');
            $table->string('shed_owner_phone_2');
            $table->string('shed_owner_address');
            $table->string('shed_owner_photo');
            $table->string('pan_number');
            $table->string('shed_adhar_number');
            $table->string('gst_no');
            $table->tinyInteger('shed_status')->default(1)->comment('1 - Active, 0 - In-Active');
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
        Schema::dropIfExists('shed__infos');
    }
}
