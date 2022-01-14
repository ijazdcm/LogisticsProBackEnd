<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sto_informations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tripsheet_id');
            $table->foreign('tripsheet_id')->references('id')->on('trip_sheets');
            $table->string('sto_delivery_number');
            $table->timestamp('delivery_date_time');
            $table->string('pod_copy');
            $table->unsignedBigInteger('driver_id');
            $table->foreign('driver_id')->references('id')->on('driver__infos');
            $table->tinyInteger('expense_to_be_capture')->default(null)->comment(' 	0 - No, 1 - Yes ');
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
        Schema::dropIfExists('sto_informations');
    }
}
