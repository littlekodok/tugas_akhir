<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WajibPajak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wajib_pajak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kecamatan')->references('id')->on('kecamatans');
            $table->foreignId('id_kelurahan')->references('id')->on('kelurahans');
            $table->foreignId('id_user')->references('id')->on('users');
            $table->date('tanggal_daftar');
            $table->integer('no_pendaftaran');
            $table->string('jenis_pendapatan');
            $table->integer('jenis_usaha');
            $table->string('nik');
            $table->string('nama');
            $table->text('alamat');
            $table->char('rt');
            $table->char('rw');
            $table->string('kabupaten');
            $table->string('kecamatan_luar')->nullable();
            $table->string('kelurahan_luar')->nullable();
            $table->string('no_telpon');
            $table->string('kode_pos');
            $table->string('email');
            $table->string('foto');
            $table->string('verifikasi');

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
        Schema::dropIfExists('wajib_pajak');
    }
}
