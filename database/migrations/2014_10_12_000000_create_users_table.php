<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name');
            $table->string('usertype')->default('user');
            $table->integer('status')->default(0);
            $table->string('email')->unique()->nullable();
            $table->string('phone1')->unique();
            $table->string('phone2')->unique()->nullable();
            $table->integer('lga_id')->nullable();
            $table->integer('ward_id')->nullable();
            $table->integer('pu_id')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital')->nullable();
            $table->string('image')->nullable();
            $table->string('pvc')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
};
