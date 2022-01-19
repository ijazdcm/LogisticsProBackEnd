<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreviousLoadDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previous_load_details', function (Blueprint $table) {
            $table->id();
            $table->string('previous_load_details');
            $table->tinyInteger('previous_load_status')->default(1)->comment('1 - Active, 0 - In-Active');
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
        Schema::dropIfExists('previous_load_details');
    }
}
