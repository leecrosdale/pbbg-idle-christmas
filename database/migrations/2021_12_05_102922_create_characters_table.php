<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('elves')->default(0);
            $table->unsignedBigInteger('elves_assigned')->default(0);
            $table->unsignedBigInteger('coins')->default(100);
            $table->foreignId('active_task_id')->nullable()->constrained('tasks');
            $table->timestamp('last_task_tick')->nullable();
            $table->timestamp('last_task_client_tick')->nullable();
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('characters');
    }
}
