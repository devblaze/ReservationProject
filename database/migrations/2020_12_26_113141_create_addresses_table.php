<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->string('region');
            $table->string('street_name');
            $table->string('postal_code');
            $table->string('comments');
            $table->timestamps();

            $table->foreign('city_id')
                ->references('id')
                ->on('cities');
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
        Schema::dropIfExists('addresses');
    }
}
