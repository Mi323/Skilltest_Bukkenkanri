<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukkenKanrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukken_kanris', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->date('date');
            $table->string('address');
            $table->string('price');
            $table->string('pic')->nullable();
            $table->string('pic2')->nullable();
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
        Schema::dropIfExists('bukken_kanris');
    }
}
