<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->references('id')->on('games');
            $table->foreignId('team_id')->references('id')->on('teams');
            $table->foreignId('player_id')->nullable()->references('id')->on('players');
            $table->tinyInteger('player_number')->nullable();
            $table->string('player_name')->nullable();
            $table->tinyInteger('event_type');
            $table->tinyInteger('minute');
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
        Schema::dropIfExists('game_events');
    }
}
