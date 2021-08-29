<?php

namespace App\Http\Controllers\Main\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Booking;
use Session;
use App\Http\Controllers\Main\Customer\data\Schedule;
use App\Models\Absen;

class AbsenCustomer extends Controller
{
    //
    public function index()
    {
        $model = Booking::all()->where('id_cs', Session::get('id_customer'));
        $current_day = date('D');
        $current_time = date('d-m-Y H:i');
        $current_date = date('Y-m-d');
        $schedule_read = new Schedule();
        return view('user.customer.screen.kehadiran.index_kehadiran',
            [
                'data' => $model,
                'day' => $schedule_read->schedule_key,
                'current_day' => $current_day,
                'current_time' => $current_time,
                'current_date' => $current_date
            ]);
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'id_booking' => 'required',
            'date' => 'required',
            'status_cs' => 'required',
        ]);

        $model = Absen::UpdateOrCreate(
            [
                'id_bookings' => $req->id_booking,
                'date' => $req->date,
                'status_cs' => $req->status_cs
            ]
        );

        if ($model->save()) {
            return redirect()->back()->with('status_absen','Anda telah ' . $req->status_cs . ' kursus');
        }
    }
}
