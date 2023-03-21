<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerijinanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_PERIJINAN', function (Blueprint $table) {
            $table->id('column_id');
            $table->char('periode', 6)->nullable();
            $table->datetime('tgl')->nullable();
            $table->string('kode', 2)->nullable();
            $table->string('no', 50)->nullable();
            $table->string('nama', 50)->nullable();
            $table->dateTime('tglterbit')->nullable();
            $table->dateTime('tglhabis')->nullable();
            $table->integer('pengingat')->nullable();
            $table->string('penerbit', 50)->nullable();
            $table->integer('lokasi')->nullable();
            $table->string('norak', 5)->nullable();
            $table->string('nobox', 5)->nullable();
            $table->integer('lampiran')->nullable();
            $table->string('keterangan', 150)->nullable();
            $table->string('files')->nullable();
            $table->string('jml', 5)->nullable();
            $table->string('img', 5)->nullable();
            $table->string('golongan', 50)->nullable();
            $table->string('kelompok', 50)->nullable();
            $table->string('c_append', 50)->nullable();
            $table->string('c_edit', 50)->nullable();
            $table->string('c_delete', 50)->nullable();
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
        Schema::dropIfExists('T_PERIJINAN');
    }
}
