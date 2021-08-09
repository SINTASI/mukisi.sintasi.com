<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->nullable()->default('anggota');
            $table->string('refs')->nullable();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('type', 50)->nullable()->default('anggota')->after('no_anggota');
            $table->unsignedBigInteger('category_id')->nullable()->after('type');
            $table->foreign('category_id')->references('id')->on('master_categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_categories');
        Schema::table('users', function (Blueprint $table) {
            $table->removeColumn('type');
            $table->dropForeign('table_category_id_foreign');
            $table->dropColumn('category_id');
        });
    }
}
