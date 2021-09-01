<?php

namespace App\Http\Controllers\Main\Customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Main\Customer\data\DetailBooking;
use App\Http\Controllers\Main\Customer\data\Schedule;
use App\Http\Controllers\utils\SettingSchdule;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Session;
use App\Models\Kursus;
use App\Models\Booking;
use App\Http\Controllers\utils\ImageUpload;

class BookingController extends Controller
{
    //
    private $day = null;
    private $customre_validate;
    public $default_directory;
    public $file_name;
    public function __construct()
    {
        $call_schedule = new SettingSchdule();
        $this->day = $call_schedule->day;
        $this->default_directory = 'user/customer/bukti_tf';
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
        } else {
            return redirect('course/' . $req->code . '/details')->with('message_error_booking', 'Pastikan jaringan anda
            internet anda stabil');
        }
    }

    public function data_booking_customer()
    {
        $model = Booking::all()->where('id_cs', Session::get('id_customer'));
        $data = [
            'data' => $model
        ];
        return view('user.customer.screen.booking.index_booking', $data);
    }

    public function data_booking_tutor($id_booking)
    {
        $model = new DetailBooking($id_booking);
        $data = [
            'data' => $model->data()['booking']
        ];
        return view('user.customer.screen.booking.detail_booking', $data);
    }

    public function schedule_customer($id_booking)
    {
        $schedule = new Schedule();
        $data = $schedule->data(['id_booking' => $id_booking]);
        return response()->json($data);
    }

    public function transfer_biaya_tutor(Request $req, $id_booking)
    {
        $model_bookings = Booking::where('id_cs', Session::get('id_customer'))->findOrFail($id_booking);
        $current_date = date('d-m-Y');
        $payment_due = date('d-m-Y', strtotime($current_date.' +1 days'));

        $kode_invoice = Booking::all()->max('id');
        $format = "#inv-";
        $kode_inv = $format . sprintf("%03s", $kode_invoice);

        $schedule = new Schedule();
        $schedule->data(['id_booking' => $id_booking]);

        $order_id = $this->generateUUID(8);
        $data = [
            'data' => $model_bookings,
            'current_date' => $current_date,
            'kode_inv' => $kode_inv,
            'oder_id' => $order_id,
            'paymet_due'=>$payment_due,
            'jumlah_pertemuan'=>$schedule->jumlah_pertemuan
        ];

        if($req->method()=='POST'){
           $this->validate($req,[
                'total_bayar'=> 'required',
                'total_bayarkan'=> 'required',
                'bukti_tf' => 'required'
            ]);
            if($req->total_bayar < $req->total_bayarkan){
               return redirect('tranfer-biaya-tutor/'.$model_bookings->id)->with('message_tr_warning','Biaya transfer anda kurang dari total yang meski dibayar');
            }

            if (!empty($req->bukti_tf)) {
                ImageUpload::$default_directory = $this->default_directory;
                ImageUpload::Upload_tf($req,$model_bookings,'bukti_tf');
                $this->file_name = ImageUpload::$file_name;
            }

            $model_bookings->kode_invoice = $req->total_kode_invoice;
            $model_bookings->bukti_tf = $this->file_name;
            $model_bookings->status_transfers = 'Konfirmasi pembayaran';
            if($model_bookings->save()){
                return redirect('tranfer-biaya-tutor/'.$model_bookings->id)->with('message_tr_success','Biaya kursus sudah kami terima. kami akan menghubungi tutor agar segera melakukan pembelajaran');
            }
        }

        return view('user.customer.screen.booking.tranfers_booking', $data);
    }

    private function generateUUID($length)
    {
        $random = '';
        for ($i = 0; $i < $length; $i++) {
            $random .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('a'), ord('z')));
        }
        return $random;
    }
}
