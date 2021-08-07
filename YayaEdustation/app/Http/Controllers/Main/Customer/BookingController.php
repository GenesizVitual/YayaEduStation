<?php

namespace App\Http\Controllers\Main\Customer;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Main\Customer\data\DetailBooking;
use App\Http\Controllers\Main\Customer\data\Schedule;
use App\Http\Controllers\utils\SettingSchdule;
use Illuminate\Http\Request;
use Session;
use App\Models\Kursus;
use App\Models\Booking;

class BookingController extends Controller
{
    //
    private $day = null;
    private $customre_validate;

    public function __construct()
    {
        $call_schedule = new SettingSchdule();
        $this->day = $call_schedule->day;
    }

    public function bookig_setting($id_kursus)
    {
        if (empty(Session::get('id_customer'))) {
            return redirect('log-in')->with('message_info', 'Anda harus login terlebih dahulu');
        }
        $data = [
            'course' => Kursus::findOrFail($id_kursus),
            'day' => $this->day
        ];
        return view('webview.screen.courses.bookings', $data);
    }

    public function sending_schedule(Request $req)
    {
        $this->validate($req, [
            '_token' => 'required',
            'durasi' => 'required'
        ]);
        $model_kursus = Kursus::findOrFail($req->code);
        $data = $req->except(['_token', 'code']);
        $data['status_customer'] = 'true';
        $model_booking = Booking::updateOrCreate(
            [
                'id_cs' => Session::get('id_customer'),
                'id_tutor' => $model_kursus->id_users,
                'id_kursus' => $model_kursus->id
            ],
            $data
        );
        if ($model_booking) {
            return redirect('course/' . $req->code . '/details')->with('message_info_booking', 'Permintaan telah dikirim ke
            pada tutor. harap menunggu sampai tutor konfirmasi permintaan anda');
        }else{
            return redirect('course/' . $req->code . '/details')->with('message_error_booking', 'Pastikan jaringan anda
            internet anda stabil');
        }
    }

    public function data_booking_customer(){
        $model = Booking::all()->where('id_cs', Session::get('id_customer'));
        $data = [
            'data'=>$model
        ];
        return view('user.customer.screen.booking.index_booking', $data);
    }

    public function data_booking_tutor($id_booking){
        $model = new DetailBooking($id_booking);
        $data = [
            'data'=>$model->data()['booking']
        ];
        return view('user.customer.screen.booking.detail_booking', $data);
    }

    public function schedule_customer($id_booking){
        $schedule = new Schedule();
        $data=$schedule->data(['id_booking'=> $id_booking]);
        return response()->json($data);
    }
}
