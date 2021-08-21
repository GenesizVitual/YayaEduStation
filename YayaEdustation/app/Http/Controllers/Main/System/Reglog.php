<?php

namespace App\Http\Controllers\Main\System;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\utils\EmailProsed;
use Session;
use Illuminate\Support\Facades\Hash;

class Reglog extends Controller
{
    //
    public function index()
    {
        return "test";
    }

    public function store(Request $req)
    {
        dd($req->all());
    }

    public function registrasi(Request $req)
    {
        $this->validate($req, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $check_mail = User::where('email', $req->email)->first();
        if (!empty($check_mail)) {
            return redirect('signup')->with('message_info', 'Email yang anda masukan telah terdaftar');
        }

        $data = $req->except(['_token']);
        $data['password'] = bcrypt($req->password);
        $data['level'] = '1';
        $model = new User($data);
        if ($model->save()) {
            if ($model->level == '1') {
                Session::put('id_customer', $model->id);
                return redirect('course')->with('message_info', 'Terimah kasih anda telah mendaftar sebagai customer');
            } else if ($model->level == '2') {
                Session::put('id_users', $model->id);
                return redirect('dashboard-tutor')->with('message_info', 'Terimah kasih anda telah mendaftar sebagai Tutor');
            }
        }
    }

    public function login_procced(Request $req)
    {
        $this->validate($req, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $model = User::where('email', $req->email)->first();
        if (!empty($model)) {
            if (Hash::check($req->password, $model->password)) {
                Session::get('id_customer', $model->id);
                if ($model->level == '1') {
                    Session::put('id_customer', $model->id);
                    return redirect('course')->with('message_info', 'Terimah kasih anda telah mendaftar sebagai customer');
                } else if ($model->level == '2') {
                    Session::put('id_users', $model->id);
                    return redirect('dashboard-tutor')->with('message_info', 'Terimah kasih anda telah mendaftar sebagai Tutor');
                }
            }
        } else {
            return redirect('log-in')->with('message_info', 'email atau password anda salah');
        }
    }

    public function test_mail()
    {
        EmailProsed::$content = [
            'title' => 'Mail from Yayaedustrasi',
            'body' => 'This is for testing email konfirm'
        ];
        $status = EmailProsed::sendingMail('lastfandiansyah@gmail.com');
        if ($status == false) {
            return "Email konfirmasi gagal dikirim ke email anda";
        } else {
            return "Email konfirmasi telah berhasil diemail anda";
        }
    }

    public function sign_out(Request $req){
        $req->session()->flush();
        return redirect('/');
    }
}
