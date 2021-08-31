<?php

namespace App\Http\Controllers\Main\Customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Main\Customer\data\Schedule;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\utils\RenderParsial;
use Session;
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

    public function get_parcial_view(Request $req){
        $model_bookings = Booking::where('id_cs', Session::get('id_customer'))->find($req->kode);
        $schedule = new Schedule();
        $day_select = $schedule->schedule_key[$req->day];
        $data_to_atur_jadwal = [
            'day_option'=> $schedule->schedule_key,
            'day_select'=>$day_select,
            'time'=>$model_bookings->$day_select,
            'booking'=> $model_bookings
        ];
        $data = [
            'pDetail'=> RenderParsial::render_bookings('user.customer.screen.schedule.parcial.detail', $model_bookings),
            'pAturJadwal'=> RenderParsial::render_view('user.customer.screen.schedule.parcial.jadwal', $data_to_atur_jadwal)
        ];
        return response()->json($data);
    }

    public function update_schedule_customer(Request $req, $id){
        $model_booking = Booking::where('id_cs',Session::get('id_customer'))->findOrFail($id);
        //cek apakah hari dan waktu telah tersisi
        $hari = $req->hari_baru;
        $hari_lama = $req->day_select_lama;
        $daycheck = $req->day_select_lama == $req->hari_baru;
        $time_check = $req->waktu == $model_booking->$hari;
        if($daycheck && $time_check){
            return redirect()->back()->with('message_fail','Hari dan waktu anda telah anda pilih');
        }

//        if($daycheck){
//            return redirect()->back()->with('message_fail','Pertemuan mengajar tutor hanya bisa dilakukan sekali');
//        }

        $model_booking->$hari_lama = null;
        $model_booking->$hari = $req->waktu;
        if($model_booking->save()){
            return redirect()->back()->with('message_success','Jadwal anda telah selesai diatur ulang');
        }
    }
}
