<?php

namespace App\Http\Controllers\Main\Tutor;

use App\Http\Controllers\Controller;
use App\Http\Controllers\utils\ImageUpload;
use App\Models\ProfileTutor;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class ProfilTutor extends Controller
{

    private $default_directory = '/user/tutor/photo';
    private $file_name = 'default-foto.jpg';
    public function __construct()
    {
        ImageUpload::$default_directory = $this->default_directory;
        ImageUpload::$file_name = $this->file_name;
    }
    public function index()
    {
        Session::put('tab-profile', 'profile');
        $users = User::find(Session::get('id_users'));
        return view('user.tutor.screen.profile.default', ['user' => $users]);
    }

    public function update(Request $req, $id)
    {
        $this->validate($req, [
            "email" => "required",
            "nama" => "required",
            "nik" => "required",
            "jenis_kelamin" => "required",
            "no_telp" => "required",
            "tempat_lahir" => "required",
            "tgl_lahir" => "required",
            "alamat" => "required",
        ]);

        $profile = ProfileTutor::updateOrCreate([
            'id_users' => $id
        ], [
            "nama" => $req->nama,
            "kode" => $req->nik,
            "jenis_kelamin" => $req->jenis_kelamin,
            "no_telp" => $req->no_telp,
            "tempat_lahir" => $req->tempat_lahir,
            "tgl_lahir" => $req->tgl_lahir,
            "alamat" => $req->alamat,
        ]);
        if ($profile) {
            return redirect('profile-tutor')->with('message_success', 'Anda telah memperbarui data diri anda');
        } else {
            return redirect('profile-tutor')->with('message_fail', 'Gagal, memperbarui data diri anda');
        }
    }

    public function upload_foto(Request $req, $id)
    {
        $this->validate($req,[
            'foto'=> 'required'
        ]);
        $model = ProfileTutor::find($id);
        ImageUpload::Upload_profile($req,$model);
        $photo_profil['foto'] = ImageUpload::$file_name;
        if ($model->update($photo_profil)) {
            return redirect('profile-tutor')->with('message_success', 'Upload foto profile berhasil');
        } else {
            return redirect('profile-tutor')->with('message_fail', 'Gagal, Upload foto profile');
        }
    }
}
