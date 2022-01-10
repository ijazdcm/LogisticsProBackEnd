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
            $table->unsignedBigInteger('vehicle_inspection_id');
            $table->foreign('vehicle_inspection_id')->references('id')->on('vehicle__inspections');
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendor__infos');
            $table->string('license_copy');
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
            $table->string('remarks');
            $table->tinyInteger('document_status')->comment('0 - Reject, 1 - Accept');
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
        Schema::dropIfExists('vehicle__documents');
    }
}
