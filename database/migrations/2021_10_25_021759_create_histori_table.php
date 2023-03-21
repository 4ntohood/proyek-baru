<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_PERIJINAN_PRINT', function (Blueprint $table) {
            $table->id('column_id');
            $table->string('periode',6)->nullable();
            $table->datetime('tgl')->nullable();
            $table->string('kode',2)->nullable();
            $table->string('no',50)->nullable();
            $table->string('nama',50)->nullable();
            $table->integer('halawal')->nullable();
            $table->integer('halakhir')->nullable();
            $table->integer('jenis')->nullable();
            $table->string('keterangan',150)->nullable();  
            $table->string('c_append',50)->nullable();    
            $table->string('c_edit',50)->nullable();    
            $table->string('c_delete',50)->nullable();  
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
        Schema::dropIfExists('T_PERIJINAN_PRINT');
    }
}
