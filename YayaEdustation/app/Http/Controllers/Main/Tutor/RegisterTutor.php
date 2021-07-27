<?php

namespace App\Http\Controllers\Main\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class RegisterTutor extends Controller
{
    //
    public function index(){
        dd('register');
    }

    public function store(Request $req){
        $this->validate($req,[
            'email'=> 'required|unique:users,email',
            'password'=> 'required',
        ]);
        $encript_password = bcrypt($req->password);
        $model = new User(
            [
                'email'=> $req->email,
                'password'=> $encript_password,
                'remember_token'=> $req->_token,
                'level'=>'2' //2 = tutor
            ]
        );

        if($model->save())
        {
            return redirect()->back()->with('message_success', 'Silahkan cek email anda untuk melakukan konfirmasi');
        }else{
            return redirect()->back()->with('message_fail', 'Email anda tidak bisa didaftarkan atau telah terdaftar');
        }

    }
}
