<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanggapanSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggapan_surats', function (Blueprint $table) {
            $table->integer("id")->autoIncrement();
            $table->integer('surat_id')->length(15)->unsigned();
            $table->string('nama_lengkap', 128);
            $table->string('institusi', 128);
            $table->integer('no_telp_institusi')->length(15)->unsigned();
            $table->string('alamat_Lengkap', 255);
            $table->string('kota', 128);
            $table->integer('no_hp')->length(15)->unsigned();
            $table->text('isi_tanggapan');
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
        Schema::dropIfExists('tanggapan_surats');
    }
}
