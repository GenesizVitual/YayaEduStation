<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_tutors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users');
            $table->string('kode');
            $table->string('nama');
            $table->enum('jenis_kelamin',['Pria','Wanita']);
            $table->text('alamat')->nullable();
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('no_telp')->nullable();
            $table->string('jenjang_pendidikan');
            $table->string('pt');
            $table->string('foto')->nullable();
            $table->string('foto_ktp')->nullable();
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('profile_tutors');
    }
}
