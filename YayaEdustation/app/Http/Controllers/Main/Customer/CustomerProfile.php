<?php

namespace App\Http\Controllers\Main\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CustomerProfile as CsModel;
use Session;
class CustomerProfile extends Controller
{
    //
    public function profile_edit(){
        $data = [
            'customer'=> User::findOrFail(Session::get('id_customer'))
        ];
        return view('user.customer.screen.profile.update_profile', $data);
    }

    public function update_profile(Request $req, $id){
        $this->validate($req,[
            'name'=> 'required',
            'email'=> 'required',
            'alamat'=> 'required',
            'no_hp'=> 'required',
        ]);

        $model = CsModel::updateOrCreate(
            [
                'id_user'=> $id
            ],
            [
                'name'=>$req->name,
                'alamat'=>$req->alamat,
                'no_hp'=>$req->no_hp,
            ]
        );

        if($model->save()){
            return redirect()->back()->with('message_info', 'Anda telah mengisi profil anda');
        }

    }
}
