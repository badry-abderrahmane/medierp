<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlimentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alimentations', function (Blueprint $table) {
          $table->increments('id');
          $table->string('designation');
          $table->string('date');
          $table->string('montant');
          $table->integer('responsable_id')->unsigned();
          $table->timestamps();

          $table->foreign('responsable_id')
                  ->references('id')->on('responsables')
                      ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alimentations');
    }
}
