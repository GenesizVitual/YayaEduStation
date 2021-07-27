<?php
/**
 * Created by PhpStorm.
 * User: Vandiansyah
 * Date: 26/07/2021
 * Time: 17:30
 */

namespace App\Http\Controllers\utils;
use Illuminate\Support\Facades\Redirect;
use Session;

class CheckCustomer
{
    public function check_custmer(){
        if(empty(Session::get('id_customer'))){
            return true;
        }
    }

}