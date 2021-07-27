<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tutor');
            $table->unsignedBigInteger('id_cs');
            $table->unsignedBigInteger('id_kursus');
            $table->string('senin')->nullable(); // ['true', 'waktu']
            $table->string('selasa')->nullable();// ['true', 'waktu']
            $table->string('rabu')->nullable();// ['true', 'waktu']
            $table->string('kamis')->nullable();// ['true', 'waktu']
            $table->string('jumat')->nullable();// ['true', 'waktu']
            $table->string('sabtu')->nullable();// ['true', 'waktu']
            $table->string('minggu')->nullable();// ['true', 'waktu']
            $table->time('durasi')->nullable();// ['true', 'waktu']
            $table->enum('status_customer',['true','false'])->default('false');
            $table->enum('status_tutor',['true','false'])->default('false');
            $table->foreign('id_tutor')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_cs')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_kursus')->references('id')->on('kursuses')->onDelete('cascade');
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
        Schema::dropIfExists('bookings');
    }
}
