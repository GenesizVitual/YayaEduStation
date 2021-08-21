<?php

namespace App\Http\Controllers\Main\Customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Main\System\data\Chat;
use Illuminate\Http\Request;
use Session;
class CustomerChat extends Controller
{
    //

    public function index()
    {
        $chat = new Chat();
        return view('user.customer.screen.chat.default',$chat->list_customer_chat());
    }
}
