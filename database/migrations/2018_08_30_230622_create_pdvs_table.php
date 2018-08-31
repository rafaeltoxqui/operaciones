<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePdvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdvs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_tienda')->unsigned();
            $table->bigInteger('id_region')->unsigned();
            $table->bigInteger('id_subregion')->unsigned();
            $table->bigInteger('id_plaza')->unsigned();
            $table->bigInteger('id_pdv_status_adquisicion')->unsigned();
            $table->bigInteger('id_pdv_status_contrato')->unsigned();
            $table->bigInteger('id_pdv_comment')->unsigned();
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
        Schema::dropIfExists('pdvs');
    }
}
