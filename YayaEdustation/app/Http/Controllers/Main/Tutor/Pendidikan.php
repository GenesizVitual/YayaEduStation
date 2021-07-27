<?php

namespace App\Http\Controllers\Main\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use App\Models\ProfileTutor;

class Pendidikan extends Controller
{
    private $jenjang_sekolah = [
        'SMA/SMK/MA',
        'S1',
        'S2',
    ];

    public function pendidikan()
    {
        Session::put('tab-profile', 'pendidikan');
        $users = User::find(Session::get('id_users'));
        return view('user.tutor.screen.profile.default', ['user' => $users, 'jenjang' => $this->jenjang_sekolah]);
    }

    public function update_pendidikan(Request $req, $id)
    {
        Session::put('tab-profile', 'pendidikan');
        $profile = ProfileTutor::updateOrCreate([
            'id_users' => $id
        ], [
            'jenjang_pendidikan' => $req->jenjang_pendidikan,
            'pt' => $req->pt,
            'jurusan' => $req->jurusan,
            'durasi_pendidikan' => $req->durasi_pendidikan,
        ]);

        if ($profile) {
            return redirect('pendidikan')->with('message_success', 'Data pendidikan telah diperbarui');
        } else {
            return redirect('pendidikan')->with('message_fail', 'Data pendidikan gagal diperbarui');
        }

    }
}
