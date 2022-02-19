<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_sheets', function (Blueprint $table) {
            $table->id();
            $table->string('trip_sheet_no')->unique();
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicle__infos');
            $table->unsignedBigInteger('driver_id')->nullable()->default(null);
            $table->foreign('driver_id')->references('id')->on('driver__infos');
            $table->unsignedBigInteger('division_id');
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->unsignedBigInteger('trip_advance_eligiblity')->nullable()->default(null)->comment('0 - No, 1 - Yes');
            $table->unsignedBigInteger('advance_amount')->nullable()->default(null);
            $table->string('purpose')->nullable()->default(null);
            $table->timestamp('expected_date_time')->useCurrent();
            $table->timestamp('expected_return_date_time')->useCurrent();
            $table->string('freight_rate_per_tone')->nullable()->default(null);
            $table->string('advance_payment_bank')->nullable()->default(null);
            $table->string('advance_payment_diesel')->nullable()->default(null);
            $table->string('remarks')->nullable()->default(null);
            $table->string('status')->default(null)->comment('0 -Open , 1 - Assigned, 2 - Closed');
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
        Schema::dropIfExists('trip_sheets');
    }
}
