<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLancamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lancamento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('referencia')->constrained('produto');
            $table->string('nome');
            $table->string('quantidade');
            $table->integer('valor');
            $table->timestamp('data_lancamento');
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
        Schema::dropIfExists('lancamento');
    }
}
