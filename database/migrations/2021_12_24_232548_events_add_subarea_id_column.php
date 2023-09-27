<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventsAddSubareaIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('events', function (Blueprint $table) {
            $table->unsignedBigInteger('subarea_id')->after('id')->nullable();

            $table->foreign('subarea_id')
                ->references('id')
                ->on('subareas')
                ->onDelete('cascade');
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
        Schema::disableForeignKeyConstraints();
        Schema::table('event', function (Blueprint $table) {
//            $table->dropForeign('subarea_id');
            $table->dropColumn('subarea_id');
        });
        Schema::enableForeignKeyConstraints();
    }
}
