<?php

namespace App\Http\Controllers\Main\Tutor;

use App\Http\Controllers\Controller;
use App\Http\Controllers\utils\RenderParsial;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\JadwalTutor as model_jadwal_tutor;
use Symfony\Component\HttpFoundation\Response;
use Session;
use App\Http\Controllers\Main\Customer\data\Schedule;


class JadwalTutor extends Controller
{
    //
    private $current_years;

    public function __construct()
    {
        $this->current_years = date('Y');
    }

    public function index(){
        return view('user.tutor.screen.schedule.index_schedule');
    }

    public function data_schedule(){
        $schedule = new Schedule();
        $data = $schedule->data_schedule();
        return response()->json($data);
    }

    public function get_parcial_view(Request $req){
        $model_bookings = Booking::where('id_tutor', Session::get('id_users'))->find($req->kode);
        $schedule = new Schedule();
        $day_select = $schedule->schedule_key[$req->day];
        $data_to_atur_jadwal = [
            'day_option'=> $schedule->schedule_key,
            'day_select'=>$day_select,
            'time'=>$model_bookings->$day_select,
            'booking'=> $model_bookings
        ];
        $data = [
            'pDetail'=> RenderParsial::render_bookings('user.tutor.screen.schedule.parcial.detail', $model_bookings),
            'pAturJadwal'=> RenderParsial::render_view('user.tutor.screen.schedule.parcial.jadwal', $data_to_atur_jadwal)
        ];
        return response()->json($data);
    }

    public function show($kode)
    {
        $pembelajaran = model_jadwal_tutor::where('id_kursus', $kode)->where('id_users', Session::get('id_users'))->whereYear('tgl', $this->current_years)->get();
        $container = [];
        foreach ($pembelajaran as $item) {
            $obj = new \stdClass();
            $obj->id = $item->id;
            $obj->title = 'jadwal kosong';
            $obj->start = $item->tgl;
            $obj->rendering = 'background';
            $obj->color = '#17a2b8';
            $container[] = $obj;
        }
        return response()->json($container);
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'tgl' => 'required',
            'waktu' => 'required',
        ]);

        $data = $req->except(['_token']);
        $data['id_users'] = Session::get('id_users');
        $jadwal_tutor = new model_jadwal_tutor($data);
        if ($jadwal_tutor->save()) {
            $feedback = [
                'data' => $jadwal_tutor,
                'message' => 'Tanggal dan waktu telah ditandai',
                'status' => Response::HTTP_CREATED
            ];
            return response()->json($feedback);
        } else {
            $feedback = [
                'data' => null,
                'message' => 'Tanggal dan waktu gagal ditandai',
                'status' => Response::HTTP_NO_CONTENT
            ];
            return response()->json($feedback);
        }
    }
}
