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
            $table->foreignId('provinsi_id');
            $table->foreignId('kabupaten_id');
            $table->string('name');
            $table->string('role');
            $table->integer('phone_number');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('jalan');
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
