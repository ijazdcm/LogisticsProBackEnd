<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->bigInteger('otp')->nullable()->default(0);
            $table->string('password');
            $table->string('mobile_no')->unique();
            $table->string('photo')->unique();
            $table->string('serial_no')->nullable()->default(null);
            $table->string('user_auto_id')->nullable()->default(null);
            $table->boolean('is_admin')->default(0)->comment('1 means Admin 0 means not a admin');
            $table->unsignedBigInteger('division_id')->nullable()->default(null);
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->unsignedBigInteger('department_id')->nullable()->default(null);
            $table->foreign('department_id')->references('id')->on('departments');
            $table->unsignedBigInteger('designation_id')->nullable()->default(null);
            $table->foreign('designation_id')->references('id')->on('designations');
            // $table->unsignedBigInteger('location_id')->nullable()->default(null);
            // $table->foreign('location_id')->references('id')->on('locations');
            $table->string('location_id')->nullable()->default(null);
            $table->json('page_permissions')->nullable()->default(null);
            $table->tinyInteger('user_status')->default(1)->comment('1 - Active, 0 - In-Active');
            $table->unsignedBigInteger('created_by')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
