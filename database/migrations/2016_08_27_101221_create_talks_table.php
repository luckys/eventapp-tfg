<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTalksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talks', function (Blueprint $table) {
            $table->uuid('id')->unique()->index();
            $table->uuid('speaker_id');
            $table->foreign('speaker_id')
                  ->references('id')
                  ->on('users');
            $table->string('title');
            $table->text('description');
            $table->enum('type', ['Seminario', 'Taller', 'Conferencia']);
            $table->enum('level', ['Principiante', 'Intermedio', 'Avanzado']);
            $table->dateTime('start_date');
            $table->smallInteger('length')->nullable();
            $table->string('address');
            $table->integer('capacity');
            $table->integer('total_tickets');
            $table->decimal('price', 8, 2)->default(0.00);
            $table->string('url_slide')->nullable();
            $table->string('file')->nullable();
            $table->string('image')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->primary('id');
        });

        Schema::create('event_talk', function (Blueprint $table) {
            $table->uuid('event_id')->index();
            $table->foreign('event_id')
                  ->references('id')->on('events');
            $table->uuid('talk_id')->index();
            $table->foreign('talk_id')
                  ->references('id')->on('talks');
            $table->dateTime('initial_date');
            $table->enum('status', ['Pendiente', 'Aprobado']);
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
        Schema::drop('talks');
    }
}
