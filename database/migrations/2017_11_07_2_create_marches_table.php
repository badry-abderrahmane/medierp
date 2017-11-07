<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marches', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->unique();
          $table->string('dateDebut');
          $table->string('delais');
          $table->string('numero')->unique();
          $table->string('montant');
          $table->integer('societe_id')->unsigned();
          $table->timestamps();

          $table->foreign('societe_id')
                  ->references('id')->on('societes')
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
        Schema::dropIfExists('marches');
    }
}
