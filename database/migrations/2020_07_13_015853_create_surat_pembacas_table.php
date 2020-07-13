<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratPembacasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_pembacas', function (Blueprint $table) {
            $table->integer('surat_id')->autoIncrement();
            $table->string('nama_lengkap', 128);
            $table->string('alamat_Lengkap', 255);
            $table->string('kelurahan', 128);
            $table->string('kecamatan', 128);
            $table->integer('no_hp')->length(15)->unsigned();
            $table->string('judul_surat', 255);
            $table->string('ditujukan', 255);
            $table->text('isi_surat');
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
        Schema::dropIfExists('surat_pembacas');
    }
}
