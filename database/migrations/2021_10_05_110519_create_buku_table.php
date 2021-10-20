<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('buku', function (Blueprint $table) {
            $table->bigIncrements('idbuku');
            $table->char('isbn', 13);
            $table->string('judul');
            $table->unsignedBigInteger('idkategori');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->string('kota_penerbit');
            $table->string('editor');
            $table->string('file_gambar');
            $table->timestamp('tgl_insert')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('tgl_update')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->integer('stok');
            $table->integer('stok_tersedia');

            // $table->foreign('idkategori')->references('idkategori')->on('kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
}
