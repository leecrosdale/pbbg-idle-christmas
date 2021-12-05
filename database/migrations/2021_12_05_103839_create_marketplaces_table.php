<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketplacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketplaces', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->foreignId('seller_id')->constrained('characters');
            $table->foreignId('item_id')->constrained();
            $table->unsignedBigInteger('quantity')->default(1);
            $table->unsignedBigInteger('price');
            $table->foreignId('buyer_id')->nullable()->constrained('characters');
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
        Schema::dropIfExists('marketplaces');
    }
}
