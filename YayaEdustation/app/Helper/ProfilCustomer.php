<?php

use App\Models\User;

if (! function_exists('profile_customer')) {
    function profile_customer($id_customer)
    {
       if(Session::get('id_customer')){
           $model = User::find($id_customer);
           return $model;
       }
        return null;
    }
}
