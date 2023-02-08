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
        Schema::create('girlfriends', function (Blueprint $table) {
            $table->id();
            $table->string('gf_name');
            $table->string('gf_profile');
            $table->text('gf_aboutme');
            $table->string('gf_rulecan');
            $table->string('gf_rulecant');
            $table->string('gf_price1');
            $table->string('gf_price2');
            $table->string('gf_description');
            $table->tinyInteger('status')->default('0')->comment('0=full,1=empty');
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
        Schema::dropIfExists('girlfriends');
    }
};
