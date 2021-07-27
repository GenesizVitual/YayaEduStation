<?php

namespace App\Http\Controllers\Main\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JadwalTutor as model_jadwal_tutor;
use Symfony\Component\HttpFoundation\Response;
use Session;


class JadwalTutor extends Controller
{
    //
    private $current_years;

    public function __construct()
    {
        $this->current_years = date('Y');
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
