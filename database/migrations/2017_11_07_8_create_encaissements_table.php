<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncaissementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encaissements', function (Blueprint $table) {
          $table->increments('id');
          $table->string('designation');
          $table->string('date');
          $table->string('montant');
          $table->string('description');
          $table->integer('marche_id')->unsigned();
          $table->timestamps();

          $table->foreign('marche_id')
                  ->references('id')->on('marches')
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
        Schema::dropIfExists('encaissements');
    }
}
