<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle__documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicle__infos');
            $table->unsignedBigInteger('vehicle_inspection_id')->nullable()->default(null);
            $table->foreign('vehicle_inspection_id')->references('id')->on('vehicle__inspections');
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendor__infos');
            $table->string('license_copy');
            $table->string('aadhar_copy');
            $table->string('pan_copy');
            $table->string('bank_pass_copy');
            $table->string('rc_copy_front');
            $table->string('rc_copy_back');
            $table->string('insurance_copy_front');
            $table->string('insurance_copy_back');
            $table->string('transport_shed_sheet');
            $table->string('tds_dec_form_front');
            $table->string('tds_dec_form_back');
            $table->unsignedBigInteger('shed_id');
            $table->foreign('shed_id')->references('id')->on('shed__infos');
            $table->string('insurance_validity');
            $table->string('ownership_transfer_form');
            $table->string('freight_rate_per_ton');
            $table->tinyInteger('vendor_flag')->comment('0 - Not Available, 1 - Available');
            $table->tinyInteger('document_status')->comment('0 - Reject, 1 - Accept');
            $table->string('remarks');
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
        Schema::dropIfExists('vehicle__documents');
    }
}
