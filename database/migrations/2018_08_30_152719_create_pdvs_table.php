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
            /*$table->foreign('id_tienda')->references('id')->on('tienda');
            $table->foreign('id_region')->references('id')->on('region');
            $table->foreign('id_subregion')->references('id')->on('subregion');
            $table->foreign('id_plaza')->references('id')->on('plaza');
            $table->foreign('id_pdv_status_adquisicion')->references('id')->on('pdv_status_adquisicions');
            $table->foreign('id_status_contrato')->references('id')->on('pdv_status_contratos');*/
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
