<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\System\Reglog;
use App\Http\Controllers\Main\System\Message;
use App\Http\Controllers\Main\Customer\BookingController;
use App\Http\Controllers\Main\Customer\DashboardCs;
use App\Http\Controllers\Main\Customer\CustomerProfile;
use App\Http\Controllers\Main\Customer\CustomerChat;

Route::post('signup', [Reglog::class, 'registrasi']);
Route::post('login-procced', [Reglog::class, 'login_procced']);
Route::resource('customer-chat', CustomerChat::class);
Route::post('send-chat', [Message::class, 'message_procced']);
Route::post('retrive-chat', [Message::class, 'data_message_customer']);
Route::get('booking-tutor/{params}', [BookingController::class, 'bookig_setting']);
Route::post('booking-tutor/{params}/sending', [BookingController::class, 'sending_schedule']);


Route::get('daftar-booking-tutor', [BookingController::class, 'data_booking_customer']);
Route::get('daftar-booking-tutor/{params}', [BookingController::class, 'data_booking_tutor']);
Route::get('dashboard-customer', [DashboardCs::class, 'index']);
Route::get('customer-profile', [CustomerProfile::class, 'profile_edit']);
Route::put('customer-profile/{params}', [CustomerProfile::class, 'update_profile']);
Route::get('schedule-customer/{params}', [BookingController::class, 'schedule_customer']);
