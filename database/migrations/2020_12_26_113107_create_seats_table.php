<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subarea_id');
            $table->integer('x');
            $table->integer('y');
            $table->longText('status');
            $table->timestamps();

            $table->foreign('subarea_id')
                ->references('id')
                ->on('subareas');

        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seats');
    }
}
