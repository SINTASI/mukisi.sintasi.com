<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('institusi_name')->nullable()->after('no_anggota');
            $table->string('rs_type')->nullable()->comment('A, B, D, C');
            $table->string('akreditasi')->nullable()->comment('Dasar, Madya, Utama, Paripurna');
            $table->string('klinik')->nullable()->comment('Klinik Utama, Klinik Pratama');
            $table->string('lab')->nullable()->comment('Madya, Pratama, utama');
            $table->string('pendidikan')->nullable()->comment('SMK Kesehatan, AKADEMI/STIKES, Universitas');
            $table->string('no_tlp_rs', 15)->nullable();
            $table->string('no_tlp', 15)->nullable();
            $table->string('no_wa', 15)->nullable();
            $table->string('img_rs')->nullable()->default('/images/no-image2.jpg');
            $table->string('img_ktp')->nullable()->default('/images/no-image2.jpg');
            $table->longText('kehalian_khusus')->nullable();
            $table->longText('alamat')->nullable();

            $table->string('prov_code', 15)->nullable();
            $table->string('kab_code', 15)->nullable();
            $table->string('kec_code', 15)->nullable();
            $table->string('kel_code', 15)->nullable();

            $table->foreignId('profesi_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}


// Nama :
// Profesi (Master profesi):
// Kategori Institusi :
// Nama Institusi :
// Kehalian khusus (text) :
// Alamat
// No Handphone (wa)

// Wilayah Provinsi :
// Wilayah Kota :
// Wilayah Kecamatan :

// Apa Anda punya minat pengembangan Pelayanan Kesehatan Islam? jika ya sebutkan
// upload KTP
