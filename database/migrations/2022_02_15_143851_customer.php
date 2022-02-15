<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Customer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_infos', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_mobile_number');
            $table->string('customer_PAN_card_number');
            $table->string('customer_PAN_card');
            $table->string('customer_Aadhar_card_number');
            $table->string('customer_Aadhar_card');
            $table->string('customer_bank_passbook');
            $table->unsignedBigInteger('customer_bank_id')->nullable();
            $table->foreign('customer_bank_id')->references('id')->on('bank_infos');
            $table->string('customer_bank_branch');
            $table->string('customer_bank_ifsc_code');
            $table->string('customer_bank_account_number');
            $table->string('customer_street_name');
            $table->string('customer_city');
            $table->string('customer_district');
            $table->string('customer_area');
            $table->string('customer_state');
            $table->string('customer_postal_code');
            $table->string('customer_region');
            $table->string('customer_gst_number');
            $table->string('customer_payment_terms');
            $table->string('customer_remarks');
            $table->tinyInteger('customer_status')->comment('0 - Created, 1 - Approved, 2 - Confirmed, 3 - Rejected');
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
        Schema::dropIfExists('customer_infos');
    }
}
