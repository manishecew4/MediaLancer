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
        Schema::create('graphers', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_id');
            $table->string('type');
            $table->string('plans');
            $table->string('price');
            $table->string('srt_desc');
            $table->string('max_del_time');
            $table->string('support_txt');
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
        Schema::dropIfExists('graphers');
    }
};
