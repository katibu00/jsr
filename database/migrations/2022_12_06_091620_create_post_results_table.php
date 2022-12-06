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
        Schema::create('post_results', function (Blueprint $table) {
            $table->id();
            $table->integer('election_id');
            $table->integer('lga_id');
            $table->integer('ward_id');
            $table->integer('pu_id');
            $table->integer('party_id');
            $table->integer('votes');
            $table->integer('user_id');
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
        Schema::dropIfExists('post_results');
    }
};
