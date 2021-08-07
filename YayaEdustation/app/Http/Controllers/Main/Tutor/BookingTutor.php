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
        $model = Booking::where('id_tutor', Session::get('id_users'))->findOrFail($id);
        $model->status_tutor = $req->status_tutor;
        if($model->status_tutor == 'true'){
            $status_book = 'berjalan';
            $msg = 'Anda telah menerima permintaan dari'.$model->linkToCustomer->name;
        }else if($model->status_tutor == 'denied'){
            $status_book = 'belum_berjalan';
            $msg = 'Anda telah menolak permintaan dari'.$model->linkToCustomer->name;
        }
        $model->status_booking = $status_book;

        if($model->save()){
            return redirect('daftar-booking')->with('message_info_booking', $msg);
        }
    }
}
