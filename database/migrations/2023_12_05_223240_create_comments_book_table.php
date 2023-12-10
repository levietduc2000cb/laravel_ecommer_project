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
        Schema::create('comments_book', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('customer_id');
            $table->string('book_id');
            $table->string('comment')->nullable();
            $table->integer('evaluate_stars')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments_book');
    }
};
