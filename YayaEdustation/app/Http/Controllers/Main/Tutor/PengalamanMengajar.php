<?php

namespace App\Http\Controllers\Main\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use App\Models\PengalamanMengajar as pm;

class PengalamanMengajar extends Controller
{
    //
    public function index()
    {
        Session::put('tab-profile', 'pengalaman');
        $users = User::find(Session::get('id_users'));
        return view('user.tutor.screen.profile.default', ['user' => $users]);
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'nama_lembaga' => 'required',
            'thn_mulai' => 'required',
            'thn_berkahir' => 'required',
        ]);

        $data = $req->except(['_token']);
        $data['id_users'] = Session::get('id_users');
        $modal = new pm($data);
        if ($modal->save()) {
            return redirect('pengalaman-mengajar')->with('message_sucess', 'Pengalaman mengajar anda telah ditambahkan');
        } else {
            return redirect('pengalaman-mengajar')->with('message_error', 'Gagal, menambahkan pengalaman mengajar anda');
        }
    }

    public function update(Request $req, $id){
        $this->validate($req, [
            'nama_lembaga' => 'required',
            'thn_mulai' => 'required',
            'thn_berkahir' => 'required',
        ]);

        $data = $req->except(['_token']);
        $data['id_users'] = Session::get('id_users');
        $modal = pm::where('id_users', Session::get('id_users'))->findOrFail($id);
        if ($modal->update($data)) {
            return redirect('pengalaman-mengajar')->with('message_sucess', 'Pengalaman mengajar anda telah diubah');
        } else {
            return redirect('pengalaman-mengajar')->with('message_error', 'Gagal, mengubah pengalaman mengajar anda');
        }
    }

    public function destroy(Request $req, $id){
       $modal = pm::where('id_users', Session::get('id_users'))->findOrFail($id);
        if ($modal->delete()) {
            return redirect('pengalaman-mengajar')->with('message_sucess', 'Pengalaman mengajar anda telah diubah');
        } else {
            return redirect('pengalaman-mengajar')->with('message_error', 'Gagal, mengubah pengalaman mengajar anda');
        }
    }
}
