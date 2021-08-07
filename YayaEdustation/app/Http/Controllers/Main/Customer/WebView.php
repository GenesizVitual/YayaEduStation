<?php

namespace App\Http\Controllers\Main\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Pelajaran;
class WebView extends Controller
{
    //
    public function index(){
        Session::put('id_users',1);
        Session::put('menu','home');
        $data = [
            'pembelajaran'=>Pelajaran::all()
        ];
        return view('webview.index',$data);
    }
}
