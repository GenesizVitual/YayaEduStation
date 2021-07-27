<?php

namespace App\Http\Controllers\Main\Tutor;

use  App\Http\Controllers\Controller;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use App\Http\Controllers\utils\ImageUpload;
use App\Models\Sertifikat as m_sertifikat;

class Sertifikat extends Controller
{
    //
    private $default_directory = '/user/tutor/sertifikat';
    private $file_name = 'default-certificate.jpg';

    public function __construct()
    {
        ImageUpload::$default_directory = $this->default_directory;
        ImageUpload::$file_name = $this->file_name;
    }

    public function index()
    {
        Session::put('tab-profile', 'sertifikat');
        $users = $this->data_sertifikat(User::find(Session::get('id_users')));
        return view('user.tutor.screen.profile.default', $users);
    }

    private function data_sertifikat($user_model)
    {
        $row = [];
        $no = 1;
        if (!empty($data = $user_model->linkToSertifikat)) {
            foreach ($data as $item) {
                $column = [];
                $column['no'] = $no++;
                $column['id'] = $item->id;
                $column['judul_sertifikat'] = $item->judul_sertifikat;
                $column['tahun'] = $item->tahun;
                $column['gambar'] = $item->gambar;
                $row[] = $column;
            }
            return array('sertifikat' => $row, 'user' => $user_model);
        }
        return null;
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'judul_sertifikat' => 'required',
            'tahun' => 'required',
            'gambar' => 'required',
        ]);
        ImageUpload::Upload($req);
        $sertifikat = $req->except(['_token']);
        $sertifikat['gambar'] = ImageUpload::$file_name;
        $sertifikat['id_users'] = Session::get('id_users');
        $model_sertifikat = new m_sertifikat($sertifikat);
        if ($model_sertifikat->save()) {
            return redirect('sertifikat')->with('message_success', 'Sertifikat telah ditambahkan');
        } else {
            return redirect('sertifikat')->with('message_fail', 'Gagal, menambahkan sertifikat');
        }
    }

    public function destroy(Request $req, $id)
    {
        $model = m_sertifikat::where('id_users', Session::get('id_users'))->findOrFail($id);
        ImageUpload::Upload($req, $model);
        if ($model->delete()) {
            return redirect('sertifikat')->with('message_success', 'Sertifikat telah dihapus');
        } else {
            return redirect('sertifikat')->with('message_fail', 'Gagal, menambahkan dihapus');
        }
    }
}
