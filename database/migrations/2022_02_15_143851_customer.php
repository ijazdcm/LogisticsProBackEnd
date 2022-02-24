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
            $table->string('creation_type');
            $table->string('customer_name');
            $table->string('customer_mobile_number');
            $table->string('customer_PAN_card_number')->nullable()->default(null);
            $table->string('customer_PAN_card')->nullable()->default(null);
            $table->string('customer_Aadhar_card_number')->nullable()->default(null);
            $table->string('customer_Aadhar_card')->nullable()->default(null);
            $table->string('customer_bank_passbook')->nullable()->default(null);
            $table->unsignedBigInteger('customer_bank_id')->nullable()->default(null);
            $table->foreign('customer_bank_id')->references('id')->on('bank_infos')->nullable()->default(null);
            $table->string('customer_bank_branch')->nullable()->default(null);
            $table->string('customer_bank_ifsc_code')->nullable()->default(null);
            $table->string('customer_bank_account_number')->nullable()->default(null);
            $table->string('customer_street_name')->nullable()->default(null);
            $table->string('customer_city')->nullable()->default(null);
            $table->string('customer_district')->nullable()->default(null);
            $table->string('customer_area')->nullable()->default(null);
            $table->string('customer_state')->nullable()->default(null);
            $table->string('customer_postal_code')->nullable()->default(null);
            $table->string('customer_region')->nullable()->default(null);
            $table->string('customer_gst_number')->nullable()->default(null);
            $table->string('customer_payment_terms')->nullable()->default(null);
            $table->string('customer_remarks')->nullable()->default(null);
            $table->tinyInteger('customer_status')->comment('0 - Created, 1 - Approved, 2 - Confirmed, 3 - Rejected')->nullable()->default(null);
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
