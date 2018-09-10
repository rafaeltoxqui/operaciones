<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pdvs', function (Blueprint $table){
            $table->foreign('id_tienda')->references('id')->on('tiendas');
            $table->foreign('id_region')->references('id')->on('regions');
            $table->foreign('id_subregion')->references('id')->on('subregions');
            $table->foreign('id_plaza')->references('id')->on('plazas');
            $table->foreign('id_pdv_status_adquisicion')->references('id')->on('pdv_status_adquisicions');
            $table->foreign('id_pdv_status_contrato')->references('id')->on('pdv_status_contratos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pdvs', function (Blueprint $table) {
            $table->dropForeign('pdvs_id_pdv_status_contrato_foreign');
            $table->dropForeign('pdvs_id_pdv_status_adquisicion_foreign');
            $table->dropForeign('pdvs_id_plaza_foreign');
            $table->dropForeign('pdvs_id_subregion_foreign');
            $table->dropForeign('pdvs_id_region_foreign');
            $table->dropForeign('pdvs_id_tienda_foreign');
        });
    }
}
