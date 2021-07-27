<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdPelajaranKursus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kursuses', function (Blueprint $table) {
            $table->dropColumn(['nama_pembelajaran']);
            $table->unsignedBigInteger('id_pelajaran');
            $table->foreign('id_pelajaran')->references('id')->on('pelajarans')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kursuses', function (Blueprint $table) {
            //
        });
    }
}
