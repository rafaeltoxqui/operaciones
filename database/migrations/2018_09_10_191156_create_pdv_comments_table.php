<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePdvCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdv_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_pdv')->unsigned();
            $table->foreign('id_pdv')->references('id')->on('pdvs');
            $table->text('comment');
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
        Schema::dropIfExists('pdv_comments');
    }
}
