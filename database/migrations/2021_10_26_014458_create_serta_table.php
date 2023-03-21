<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_PERIJINAN_TANAH', function (Blueprint $table) {
            $table->id('Column_ID');
            $table->char('PERIODE')->nullable();
            $table->datetime('TGL')->nullable();
            $table->string('KODE',2)->nullable();
            $table->string('NO',50)->nullable();
            $table->string('PROVINSI',50)->nullable();
            $table->string('KOTA',50)->nullable();
            $table->string('KECAMATAN',50)->nullable();
            $table->string('DESA',50)->nullable();
            $table->integer('HAK')->nullable();
            $table->string('NAMA',50)->nullable();
            $table->datetime('SUTGL')->nullable();
            $table->string('SUNO',50)->nullable();
            $table->decimal('SULUAS',18,2)->nullable();
            $table->integer('JML')->nullable();
            $table->string('KETERANGAN',150)->nullable();
            $table->longText('FILES')->nullable();
            $table->binary('PDF')->nullable();
            $table->string('IMG')->nullable();
            $table->datetime('TGLTERBIT')->nullable();
            $table->datetime('TGLHABIS')->nullable();
            $table->integer('PENGINGAT')->nullable();
            $table->string('C_Append',50)->nullable();
            $table->string('C_Edit',50)->nullable();
            $table->string('C_Delete',50)->nullable();
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
        Schema::dropIfExists('T_PERIJINAN_TANAH');
    }
}
