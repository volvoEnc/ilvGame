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
            $table->foreignId('invite_user_id')->nullable();
            $table->string('nickname', 15);
            $table->string('email', 80);
            $table->bigInteger('money')->unsigned()->default(0);
            $table->enum('status', ['active', 'ban'])->default('active');
            $table->string('theme', 35)->default('default');
            $table->timestamps();

            $table->foreign('invite_user_id')->references('id')->on('users');
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
