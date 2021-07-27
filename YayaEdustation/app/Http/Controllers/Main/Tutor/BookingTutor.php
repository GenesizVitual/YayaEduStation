<?php

namespace App\Http\Controllers\Main\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Booking;

class BookingTutor extends Controller
{
    //
    public function index(){
        $data_pass = [
            'booking'=> Booking::where('id_tutor', Session::get('id_users'))->orderBy('created_at','desc')->get()
        ];
        return view('user.tutor.screen.booking.default', $data_pass);
    }

    public function update(Request $req, $id){
         $this->validate($req,[
            'status_tutor'=>'required',
            '_token'=> 'required'
        ]);
    }
}
