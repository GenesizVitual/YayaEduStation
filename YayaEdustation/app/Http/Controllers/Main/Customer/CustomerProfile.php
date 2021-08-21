<?php

namespace App\Http\Controllers\Main\Customer;

use App\Http\Controllers\Controller;
use App\Models\ProfileTutor;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CustomerProfile as CsModel;
use App\Http\Controllers\utils\ImageUpload;
use Session;

class CustomerProfile extends Controller
{
    //
    private $default_directory = '/user/customer/photo';
    private $file_name = '';
    public function __construct()
    {
        ImageUpload::$default_directory = $this->default_directory;
        ImageUpload::$file_name = $this->file_name;
    }
    public function profile_edit()
    {
        $data = [
            'customer' => User::findOrFail(Session::get('id_customer'))
        ];
        return view('user.customer.screen.profile.update_profile', $data);
    }

    public function update_profile(Request $req, $id)
    {
        $this->validate($req, [
            'name' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        if (!empty($req->foto)) {
            ImageUpload::Upload_profile($req);
            $this->file_name = ImageUpload::$file_name;
        }
        $model = CsModel::updateOrCreate(
            [
                'id_user' => $id
            ],
            [
                'name' => $req->name,
                'alamat' => $req->alamat,
                'no_hp' => $req->no_hp,
                'foto_profile'=> $this->file_name
            ]
        );

        if ($model->save()) {
            return redirect()->back()->with('message_info', 'Anda telah mengisi profil anda');
        }

    }
}
