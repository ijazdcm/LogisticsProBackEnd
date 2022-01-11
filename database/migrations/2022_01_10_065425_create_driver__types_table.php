<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver__types', function (Blueprint $table) {
            $table->id();
            $table->string('driver_type');
            $table->tinyInteger('driver_type_status')->default(1)->comment('None 1 - Active, 0 - In-Active');
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
        Schema::dropIfExists('driver__types');
    }
}
