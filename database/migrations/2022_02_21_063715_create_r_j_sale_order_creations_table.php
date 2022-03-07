<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRJSaleOrderCreationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rj_so_creation', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('vehicle_id');
            $table->string('tripsheet_id');
            $table->tinyInteger('payment_terms');
            $table->string('pay_customer_name')->nullable();
            $table->string('customer_mobile_no')->nullable();
            $table->string('customer_PAN_number')->nullable();
            $table->tinyInteger('shed_id');
            // $table->string('shed_pan');
            // $table->string('shed_aadhar');
            $table->tinyInteger('material_description_id');
            $table->string('material_descriptions');
            $table->tinyInteger('uom_id');
            $table->string('order_qty');
            $table->integer('customer_code');
            $table->integer('hsn_code');
            $table->string('freight_income');
            $table->string('advance_amount');
            $table->string('last_Delivery_point');
            $table->string('empty_load_km');
            $table->string('loading_point');
            $table->string('unloading_point');
            $table->string('empty_km_after_unloaded');
            $table->timestamp('expected_delivery_date_time')->nullable();;
            $table->timestamp('expected_return_date_time')->nullable();;
            $table->string('remarks')->nullable();
            $table->integer('rj_so_no');
            $table->tinyInteger('created_by')->default(0);
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
        Schema::dropIfExists('rj_so_creation');
    }
}
