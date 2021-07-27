<?php

namespace App\Http\Controllers\Main\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
class Dashboard extends Controller
{
    //
    public function index(){
        $dashboard = [
            'profile'=> User::find(Session::get('id_users'))
        ];
        return view('user.tutor.screen.dashboard.dashboard', $dashboard);
    }
}
