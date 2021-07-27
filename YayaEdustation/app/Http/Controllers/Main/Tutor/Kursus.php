<?php

namespace App\Http\Controllers\Main\Tutor;

use App\Http\Controllers\Controller;
use App\Models\Kursus as model_kursus;
use App\Http\Controllers\utils\RenderParsial;
use Illuminate\Http\Request;
use Session;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Pelajaran;
class Kursus extends Controller
{
    public function index()
    {
        $data = [
            'pelajaran'=>Pelajaran::orderBy('pelajaran','asc')->get()
        ];
        return view('user.tutor.screen.course.default', $data);
    }

    public function show(){

        $kursus = model_kursus::where('id_users', Session::get('id_users'))->orderBy('id', 'desc')->get();
        $container = array();
        foreach ($kursus as $item){
            $container[] = RenderParsial::render_partial('user.tutor.screen.course.parsial.CardPembelajaran', $item);
        }

        $data = [
            'data' =>$container,
            'status'=> Response::HTTP_OK
        ];
        return response()->json($data);
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'id_pelajaran' => 'required',
            'harga' => 'required',
            'durasi' => 'required',
            'tentang_materi' => 'required',
        ]);
        $data = $req->except(['_token']);
        $data['id_users'] = Session::get('id_users');
        $model_kursus = new model_kursus($data);
        if ($model_kursus->save()) {
            $message = [
                'data' => RenderParsial::render_partial('user.tutor.screen.course.parsial.CardPembelajaran', $model_kursus),
                'status' => Response::HTTP_ACCEPTED
            ];
            return response()->json($message);
        }
        $message = [
            'data' => null,
            'status' => Response::HTTP_NO_CONTENT
        ];
        return response()->json($message);
    }

    public function edit($id)
    {
        $kursus = model_kursus::where('id_users', Session::get('id_users'))->find($id);
        if (!empty($kursus)) {
            $data = [
                'data' => $kursus,
                'status' => Response::HTTP_OK
            ];
            return response()->json($data);
        } else {
            $data = [
                'status' => Response::HTTP_NO_CONTENT
            ];
            return response()->json($data);
        }

    }

    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'id_pelajaran' => 'required',
            'harga' => 'required',
            'durasi' => 'required',
        ]);
        $data = $req->except(['_token']);
        $data['id_users'] = Session::get('id_users');
        $model_kursus = model_kursus::where('id_users',Session::get('id_users'))->find($id);
        if ($model_kursus->update($data)) {
            $message = [
                'data' => RenderParsial::render_partial('user.tutor.screen.course.parsial.CardPembelajaran', $model_kursus),
                'status' => Response::HTTP_ACCEPTED
            ];
            return response()->json($message);
        }
        $message = [
            'data' => null,
            'status' => Response::HTTP_NO_CONTENT
        ];
        return response()->json($message);
    }

    public function destroy(Request $req, $id){
        $model_kursus = model_kursus::where('id_users',Session::get('id_users'))->find($id);
        if ($model_kursus->delete()) {
            $message = [
                'status' => Response::HTTP_ACCEPTED
            ];
            return response()->json($message);
        }
        $message = [
            'data' => null,
            'status' => Response::HTTP_NO_CONTENT
        ];
        return response()->json($message);
    }
}
