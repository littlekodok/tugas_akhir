<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoObjekPajak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_objek_pajak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_wajib_pajak')->references('id')->on('wajib_pajak');
            $table->foreignId('id_objek_pajak')->references('id')->on('objek_pajaks');
            $table->string('foto');
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
        Schema::dropIfExists('foto_objek_pajak');
    }
}
