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
            $table->unsignedBigInteger('shed_id');
            $table->foreign('shed_id')->references('id')->on('shed__infos');
            $table->string('owner_name');
            $table->string('pan_card_number');
            $table->string('pan_card_attachment');
            $table->bigInteger('aadhar_card_number');
            $table->string('aadhar_card_copy');
            $table->string('license_copy');
            $table->string('rc_copy_front');
            $table->string('rc_copy_back');
            $table->string('insurance_copy');
            $table->string('transpoter_shed_sheet');
            $table->string('bank_pass_book_copy');
            $table->string('bank_name');
            $table->string('bank_branch');
            $table->string('bank_ifsc_Code');
            $table->string('bank_acc_number');
            $table->string('bank_acc_holder_name');
            $table->string('street');
            $table->string('area');
            $table->string('city');
            $table->string('district');
            $table->string('state');
            $table->string('postal_code');
            $table->string('region');
            $table->string('tds_decelration_form_front');
            $table->string('tds_decelration_form_back');
            $table->string('gts_registration');
            $table->string('gts_registration_number');
            $table->string('gst_tax_code');
            $table->string('payment_term_3days');
            $table->string('remarks');
            $table->tinyInteger('vendor_status')->default(2)->comment('1 - Approved, 0 - Rejected, 2 - created ');
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
