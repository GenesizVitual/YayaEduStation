<?php

use App\Http\Controllers\Main\Tutor\Dashboard as dashboard_tutor;
use App\Http\Controllers\Main\Tutor\JadwalTutor;
use App\Http\Controllers\Main\Tutor\Kursus;
use App\Http\Controllers\Main\Tutor\Materi;
use App\Http\Controllers\Main\Tutor\Pendidikan;
use App\Http\Controllers\Main\Tutor\PengalamanMengajar;
use App\Http\Controllers\Main\Tutor\ProfilTutor;
use App\Http\Controllers\Main\Tutor\RegisterTutor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\Tutor\Sertifikat;
use App\Http\Controllers\Main\System\Message;
use App\Http\Controllers\Main\Tutor\BookingTutor;
use App\Http\Controllers\Main\Tutor\AbsenTutor;
use App\Http\Controllers\Main\Admin\DetailAbsen;

Route::get('cek', function () {
    return "text";
});
Route::get('dashboard-tutor', [dashboard_tutor::class, 'index']);
Route::resource('jadwal-tutor',JadwalTutor::class);
Route::get('load-jadwal-kursus-tutor',[JadwalTutor::class,'data_schedule']);
Route::post('load-jadwal-kursus-tutor',[JadwalTutor::class,'get_parcial_view']);
Route::resource('kursus', Kursus::class);
Route::get('kursus/data', [Kursus::class,'data']);
Route::resource('materi',Materi::class);
Route::get('message-chat',[Message::class,'list_customer_chat']);
Route::get('message-chat/{kode}',[Message::class,'data_message']);
Route::resource('profile-tutor', ProfilTutor::class);
Route::get('pendidikan', [Pendidikan::class, 'pendidikan']);
Route::put('pendidikan/{params}', [Pendidikan::class, 'update_pendidikan']);
Route::resource('pengalaman-mengajar', PengalamanMengajar::class);
Route::post('replay-message',[Message::class,'replay_message']);
Route::resource('sertifikat', Sertifikat::class);
Route::resource('tutor', RegisterTutor::class);
Route::put('upload-photo-tutor/{params}', [ProfilTutor::class, 'upload_foto']);
Route::get('daftar-booking',[BookingTutor::class,'index']);
Route::put('proses-booking/{params}',[BookingTutor::class,'update']);
Route::resource('absen-tutor',AbsenTutor::class);
Route::resource('detail-absen', DetailAbsen::class);
