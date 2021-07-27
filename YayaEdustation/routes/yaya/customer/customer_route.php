<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\System\Reglog;
use App\Http\Controllers\Main\System\Message;
use App\Http\Controllers\BookingController;
Route::post('signup', [Reglog::class, 'registrasi']);
Route::post('login-procced', [Reglog::class, 'login_procced']);
Route::post('send-chat', [Message::class, 'message_procced']);
Route::post('retrive-chat', [Message::class, 'data_message_customer']);
Route::get('booking-tutor/{params}', [BookingController::class, 'bookig_setting']);
Route::post('booking-tutor/{params}/sending', [BookingController::class, 'sending_schedule']);


