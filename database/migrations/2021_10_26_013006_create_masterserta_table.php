<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMastersertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('T_MST_PERUSAHAAN', function (Blueprint $table) {
            $table->id('column_id');
            $table->char('kode')->nullable();
            $table->string('nama')->nullable();
            $table->string('initial')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('c_append')->nullable();
            $table->string('c_edit')->nullable();
            $table->string('c_delete')->nullable();
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
        Schema::dropIfExists('T_MST_PERUSAHAAN');
    }
}
