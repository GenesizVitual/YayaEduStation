<?php

namespace App\Http\Controllers\Main\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
class DashboardCs extends Controller
{
    //
    private $user_model;
    public function __construct()
    {
        $this->middleware(function ($req, $next){
            if(empty($req->session()->get('id_customer'))){
                return redirect('log-in')->with('message_info','Anda harus login');
            }else{
                $this->user_model = User::findOrFail($req->session()->get('id_customer'));
            }
            return $next($req);
        });
    }

    public function index(){
        $data = [
            'customer'=> $this->user_model
        ];
        return view('user.customer.screen.dashboard.dashboard', $data);
    }
}
