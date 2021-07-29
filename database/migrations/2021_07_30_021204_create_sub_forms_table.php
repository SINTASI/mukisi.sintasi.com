<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_lines', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('label');
            $table->json('data')->nullable();
            $table->string('icon', 50)->default('info');
            $table->string('type', 20)->default('text');
            $table->boolean('required')->default(false);
            $table->string('placeholder')->nullable();
            $table->foreignId('form_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('form_lines');
    }
}
