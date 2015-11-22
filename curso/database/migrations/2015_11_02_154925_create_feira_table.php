<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeirasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feira', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo', 100);
            $table->string('local', 100);
            $table->date('data') ;
            $table->string('observacao', 200);
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
        Schema::drop('feiras');
    }
}
