<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->foreignId('skill_id')->constrained();
            $table->foreignId('item_id')->constrained();
            $table->unsignedBigInteger('item_quantity')->default(1);
            $table->unsignedBigInteger('skill_level_required')->default(0);
            $table->json('items_required')->nullable();
            $table->json('skills_gained')->nullable();
            $table->unsignedBigInteger('time_in_seconds')->default(2);
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
        Schema::dropIfExists('tasks');
    }
}
