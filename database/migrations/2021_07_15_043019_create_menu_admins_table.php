<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_admins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('link')->nullable()->default('/');
            $table->string('icon')->nullable()->default('folder');
            $table->string('color')->nullable()->default('primary');
            $table->bigInteger('parent')->nullable()->default(0);
            $table->integer('seq_no')->nullable()->default(1);
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('menu_admins');
    }
}
