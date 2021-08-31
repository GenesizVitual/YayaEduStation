<?php

namespace App\Http\Controllers\Main\Tutor;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Main\Customer\data\Schedule;
use App\Models\Absen;
use App\Models\Booking;
use Illuminate\Http\Request;
use Session;

class AbsenTutor extends Controller
{
    //
    public function index()
    {
        $model = Booking::all()->where('id_tutor', Session::get('id_users'));
        $current_day = date('D');
        $current_time = date('d-m-Y H:i');
        $current_first = date('H:i');
        $current_date = date('Y-m-d');
        $schedule_read = new Schedule();
        return view('user.tutor.screen.kehadiran.index_kehadiran',
            [
                'data' => $model,
                'day' => $schedule_read->schedule_key,
                'current_day' => $current_day,
                'current_time' => $current_time,
                'current_date' => $current_date,
                'current_time_on'=>$current_first
            ]);
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'id_booking' => 'required',
            'date' => 'required',
            'status_tt' => 'required',
        ]);

        $model = Absen::UpdateOrCreate(
            [
                'id_bookings' => $req->id_booking,
                'date' => $req->date,
            ],
            [
                'status_tt' => $req->status_tt
            ]
        );

        if($req->status_tt=='hadir'){
            $req->status_tt = 'memulai';
        }

        if ($model->save()) {
            return redirect()->back()->with('status_absen','Anda telah ' . $req->status_tt . ' kursus');
        }
    }
}
