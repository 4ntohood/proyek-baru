<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGolongansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_MST_GOLONGAN', function (Blueprint $table) {
            $table->id('column_id');
            $table->string('kelompok', 50)->nullable();
            $table->string('golongan', 50)->nullable();
            $table->string('c_append', 50)->nullable();
            $table->string('c_edit', 50)->nullable();
            $table->string('c_delete', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('T_MST_GOLONGAN');
    }
}
