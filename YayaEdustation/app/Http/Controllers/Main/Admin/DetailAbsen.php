<?php

namespace App\Http\Controllers\Main\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Main\Customer\data\Schedule;
class DetailAbsen extends Controller
{
    //

    public function show_customer($id){
        $booking = Booking::findOrFail($id);
        $data = [
            'booking'=> $booking,
        ];
        return view('user.customer.screen.detail_kehadiran.index_detail_kehadiran', $data);
    }

    public function show($id){
        $booking = Booking::findOrFail($id);
        $data = [
            'booking'=> $booking,
        ];
        return view('user.tutor.screen.detail_kehadiran.index_detail_kehadiran', $data);
    }
}
