<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('images')->nullable();
            $table->string('class')->nullable()->default('card card-style mx-3 mt-4 bg-20');
            $table->integer('height')->nullable()->default('210');
            $table->integer('seq_no')->nullable()->default(1);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }
    // https://mukisi.com/wp-content/uploads/2020/09/slider-3.jpg

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
