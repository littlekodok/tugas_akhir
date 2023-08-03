<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_wajib_pajak')->references('id')->on('wajib_pajak');
            $table->foreignId('id_objek_pajak')->references('id')->on('objek_pajaks');
            $table->foreignId('id_jenis_pajak')->references('id')->on('jenis_pajaks');
            $table->integer('no_transaksi');
            $table->date('tanggal_pendataan');
            $table->date('masa_awal')->nullable();
            $table->date('masa_akhir')->nullable();
            $table->string('norek_transaksi');
            $table->string('kode_bayar');
            $table->text('kegiatan');
            $table->date('bulan_bayar')->nullable();
            $table->integer('dasar_pengenaan');
            $table->integer('tarif_pajak');
            $table->integer('total_pajak');
            $table->integer('jumlah_bayar');
            $table->date('tanggal_pembayaran')->nullable();
            $table->date('tanggal_jatuh_tempo')->nullable();
            $table->integer('jumlah_denda')->nullable();
            $table->string('metode_bayar')->default('MIDTRANS');
            $table->string('status')->default('PENDING');
            $table->string('url_pembayaran')->nullable();
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
        Schema::dropIfExists('transaksi');
    }
}
