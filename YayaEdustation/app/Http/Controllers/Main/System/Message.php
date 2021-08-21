<?php

namespace App\Http\Controllers\Main\System;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Main\System\data\Chat;
use App\Http\Controllers\utils\RenderParsial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use App\Models\MessageModel;


class Message extends Controller
{
    //
    public function message(Request $req){
        $data = new Chat();
        return response()->json($data->message($req));
    }

    public function list_customer_chat(){
        $customer_chat = new Chat();
        return view('user.tutor.screen.chat.default',$customer_chat->list_customer_chat());
    }

    // tutor side
    public function data_message($no_unique)
    {
        $chat= new Chat();
        return response()->json($chat->data_message($no_unique));
    }

    // customer side
    public function data_message_customer(Request $req)
    {
        $this->validate($req,[
            'no_unique'=>'required',
        ]);
        $chat = new Chat();
        return response()->json($chat->data_message_customer($req));
    }

    //Tutor side
    public function replay_message(Request $req){
        $this->validate($req,[
            'to_id'=> 'required',
            'content'=> 'required',
            'no_unique'=> 'required',
        ]);
        $data = $req->except(['_token']);
        $data['from_id'] = Session::get('id_users');
        $model =new MessageModel($data);
        if($model->save()){
            return response()->json(['status'=> true, 'uid'=>$model->no_unique]);
        }
        return response()->json(['status'=> false, 'uid'=>$req->ui_kode]);
    }

    // customer side
    public function message_procced(Request $req){
        $this->validate($req,[
            'to_id'=> 'required',
            'id_kursus'=> 'required',
            'content'=> 'required'
        ]);
        $data = $req->except(['_token']);
        $data['from_id']= Session::get('id_customer');
        $check_code = MessageModel::where('from_id', Session::get('id_customer'))
            ->where('id_kursus', $req->id_kursus)->first();
        if(!empty($check_code)){
            $data['no_unique']= $check_code->no_unique;
        }else{
            $data['no_unique']= (string)Str::uuid();
        }
        $model = new MessageModel($data);
        if($model->save()){
            return response()->json(array(
                'data'=>$model,
                'status'=> true,
            ));
        }
    }
}
