<?php

namespace App\Http\Controllers\Main\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kursus;
use App\Models\Materi as model_materi;
use Session;

class Materi extends Controller
{
    //
    public function show($id_course)
    {
        $kursus = Kursus::where('id_users', Session::get('id_users'))->findOrFail($id_course);
        return view('user.tutor.screen.materi.default', ['data' => $kursus, 'id_kursus' => $id_course,'materi'=>null]);
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            "id_kursus" => "required",
            "judul" => "required",
            "detail" => "required",
        ]);

        $data = $req->except(['_token']);
        $data['id_users'] = Session::get('id_users');
        $materi = new model_materi($data);
        if ($materi->save()) {
            return redirect('materi/'.$materi->id_kursus)->with('message_success', 'Materi telah ditambahkan');
        } else {
            return redirect('materi/'.$materi->id_kursus)->with('message_error', 'Gagal, menambahkan materi');
        }
    }

    public function edit($id_materi)
    {
        $materi = model_materi::where('id_users', Session::get('id_users'))->findOrFail($id_materi);
        $kursus = Kursus::where('id_users', Session::get('id_users'))->find($materi->id_kursus);
        return view('user.tutor.screen.materi.default', ['data' => $kursus,'materi'=> $materi, 'id_kursus' => $materi->id_kursus]);
    }

    public function update(Request $req, $id){
        $this->validate($req, [
            "id_kursus" => "required",
            "judul" => "required",
            "detail" => "required",
        ]);

        $data = $req->except(['_token']);
        $data['id_users'] = Session::get('id_users');
        $materi = model_materi::find($id);
        if ($materi->update($data)) {
            return redirect('materi/'.$materi->id_kursus)->with('message_success', 'Materi telah diubah');
        } else {
            return redirect('materi/'.$materi->id_kursus)->with('message_error', 'Gagal, mengubah materi');
        }
    }

    public function destroy(Request $req, $id){
        $materi = model_materi::find($id);
        if ($materi->delete()) {
            return redirect('materi/'.$materi->id_kursus)->with('message_success', 'Materi '.$materi->judul.' telah dihapus');
        } else {
            return redirect('materi/'.$materi->id_kursus)->with('message_error', 'Gagal, menghapus materi '.$materi->judul);
        }
    }
}
