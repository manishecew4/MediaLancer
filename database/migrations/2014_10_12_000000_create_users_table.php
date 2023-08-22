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
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->tinyInteger('type')->default(0);
            $table->string('is_approve')->default('false');

            /* Users: 0=>User, 1=>Admin, 2=>Vendor */
            $table->string('is_also_vendor')->default('false');
            $table->string('avatar_user')->nullable();
            $table->string('avatar_vendor')->nullable();
            $table->string('address')->nullable();
            $table->string('landmark')->nullable();
            $table->string('pin')->nullable();
            $table->string('description')->nullable();
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
