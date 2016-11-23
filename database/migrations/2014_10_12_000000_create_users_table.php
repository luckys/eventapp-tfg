<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->uuid('id')->unique()->index();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('firstname');
            $table->string('lastname');
            $table->string('company')->nullable();
            $table->string('job')->nullable();
            $table->text('biography')->nullable();
            $table->string('url_github')->nullable();
            $table->string('url_twitter')->nullable();
            $table->string('photo')->default('default.jpg');
            $table->rememberToken();
            $table->timestamps();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
