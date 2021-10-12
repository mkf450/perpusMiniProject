<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->bigIncrements('idtransaksi');
            $table->char('nim', 14);
            $table->foreign('nim')->references('nim')->on('anggota')->onDelete('cascade');
            $table->timestamp('tgl_pinjam')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('total_denda');
            $table->unsignedBigInteger('idpetugas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjaman');
    }
}
