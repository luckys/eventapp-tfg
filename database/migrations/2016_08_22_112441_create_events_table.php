<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->uuid('id')->index();
            $table->uuid('user_id');
            $table->string('name');
            $table->string('description');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('address');
            $table->decimal('price', 5, 2);
            $table->string('image');
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
        Schema::drop('event');
    }
}
