<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bookings');
            $table->date('date');
            $table->enum('status_cs',['belum absen','hadir','akhiri'])->default('belum absen');
            $table->enum('status_tt',['belum absen','hadir','akhiri'])->default('belum absen');
            $table->timestamps();
            $table->foreign('id_bookings')->references('id')->on('bookings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absens');
    }
}
