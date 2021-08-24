<?php

namespace App\Http\Controllers\Main\Customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Main\Customer\data\Schedule;
use Illuminate\Http\Request;

class CustomerJadwal extends Controller
{
    //
    public function index(){
        return view('user.customer.screen.schedule.index_schedule');
    }

    public function data_schedule(){
        $schedule = new Schedule();
        $data = $schedule->data_schedule();
        return response()->json($data);
    }
}
