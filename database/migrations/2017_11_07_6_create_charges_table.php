<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charges', function (Blueprint $table) {
          $table->increments('id');
          $table->string('designation');
          $table->string('date');
          $table->string('montant');
          $table->integer('typecharge_id')->unsigned();
          $table->integer('marche_id')->unsigned();
          $table->integer('societe_id')->unsigned();
          $table->integer('responsable_id')->unsigned();
          $table->timestamps();

          $table->foreign('typecharge_id')
                  ->references('id')->on('typecharges')
                    ->onDelete('cascade');

          $table->foreign('marche_id')
                  ->references('id')->on('marches')
                      ->onDelete('cascade');

          $table->foreign('societe_id')
                  ->references('id')->on('societes')
                      ->onDelete('cascade');

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
        Schema::dropIfExists('charges');
    }
}
