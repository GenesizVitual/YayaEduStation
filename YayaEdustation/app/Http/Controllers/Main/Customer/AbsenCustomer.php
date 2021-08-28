<?php

namespace App\Http\Controllers\Main\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Booking;
use Session;
use App\Http\Controllers\Main\Customer\data\Schedule;

class AbsenCustomer extends Controller
{
    //
    public function index()
    {
        $model = Booking::all()->where('id_cs', Session::get('id_customer'));
        $schedule_read = new Schedule();
        return view('user.customer.screen.kehadiran.index_kehadiran', ['data' => $model, 'day' => $schedule_read->schedule_key]);
    }
}
