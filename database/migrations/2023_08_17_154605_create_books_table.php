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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('author');
            $table->text('des')->nullable();
            $table->string('publisher');
            $table->string('supplier');
            $table->double('price')->default(0);
            $table->double('sale')->default(0);
            $table->string('cover');
            $table->string('type');
            $table->json('image')->nullable();
            $table->integer('quantity');
            $table->integer('quantity_order_number')->nullable();
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
        Schema::dropIfExists('books');
    }
};
