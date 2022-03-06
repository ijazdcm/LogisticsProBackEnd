<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor__infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicle__infos');
            $table->unsignedBigInteger('shed_id');
            $table->foreign('shed_id')->references('id')->on('shed__infos');
            $table->unsignedBigInteger('vendor_code')->default(0);
            $table->string('owner_name')->nullable();
            $table->unsignedBigInteger('owner_number')->nullable();
            $table->string('pan_card_number')->nullable();
            $table->bigInteger('aadhar_card_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_acc_number')->nullable();
            $table->string('bank_acc_holder_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_ifsc')->nullable();
            $table->string('street')->nullable();
            $table->string('area')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('region')->nullable();
            $table->string('gst_registration')->nullable();
            $table->string('gst_registration_number')->nullable();
            $table->string('gst_tax_code')->nullable();
            $table->string('payment_term_3days')->nullable();
            $table->tinyInteger('vendor_status')->default(1)->comment('0 - Rejected,1 - Created, 2 - Updated, 3 - Approved, 4 - Confirmed');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('vendor__infos');
    }
}
