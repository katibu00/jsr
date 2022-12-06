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
        Schema::create('post_result_submits', function (Blueprint $table) {
            $table->id();
            $table->integer('election_id');
            $table->integer('lga_id');
            $table->integer('ward_id');
            $table->integer('pu_id');
            $table->integer('user_id');
            $table->integer('registered');
            $table->integer('accredited');
            $table->integer('valid');
            $table->integer('rejected');
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
        Schema::dropIfExists('post_result_submits');
    }
};
