<?php

namespace App\Http\Controllers\Main\System;

use App\Http\Controllers\Controller;
use App\Http\Controllers\utils\RenderParsial;
use function Couchbase\passthruDecoder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use App\Models\MessageModel;
class Message extends Controller
{
    //
    public function message(Request $req){
        $model = MessageModel::where('id_kursus', $req->params2)
            ->where('from_id', Session::get('id_customer'))
            ->where('to_id', $req->params1)
            ->first();
        $no_unique = '';
        if(!empty($model)){
            $no_unique = $model->no_unique;
        }
        if(empty(Session::get('id_customer'))){
            return response()->json(array(
                'status'=>false,
            ));
        }
        return response()->json(array(
            'status'=> true,
            'id_tutor'=> $req->params1,
            'id_kursus'=>$req->params2,
            'no_uid'=> $no_unique
        ));
    }

    public function list_customer_chat(){
        $customer_chat = MessageModel::all()->where('to_id', Session::get('id_users'))->sortByDesc('created_at')
            ->groupBy('from_id');
        return view('user.tutor.screen.chat.default',['customer_chat'=> $customer_chat]);
    }

    // tutor side
    public function data_message($no_unique)
    {
        $model = MessageModel::where('no_unique', $no_unique);

        $container = [];
        foreach ($model->orderBy('created_at','asc')->get() as $data){
            if($data->from_id == Session::get('id_users')){
                $parcial= 'user.tutor.screen.chat.parsial.outgoing_msg';
            }else{
                $parcial= 'user.tutor.screen.chat.parsial.incoming_msg';
            }
            $column = [];
            $column['content'] = RenderParsial::render_partial_chat($parcial, $data);
            $container[] = $column;
        }
        $n_model = $model->first();
        return response()->json(['data'=>$container, 'uid'=> $n_model->no_unique,'to_id'=> $n_model->from_id,'id_kursus'=>$n_model->id_kursus]);
    }


    // customer side
    public function data_message_customer(Request $req)
    {
        $this->validate($req,[
            'no_unique'=>'required',
        ]);

        $model = MessageModel::where('no_unique', $req->no_unique);

        $container = [];
        foreach ($model->orderBy('created_at','asc')->get() as $data){
            if($data->from_id == Session::get('id_customer')){
                $parcial= 'webview.screen.courses.parsial.chat_left';
            }else{
                $parcial= 'webview.screen.courses.parsial.chat_right';
            }
            $column = [];
            $column['content'] = RenderParsial::render_partial_chat($parcial, $data);
            $container[] = $column;
        }
//        $n_model = $model->first();
        return response()->json(['data'=>$container,'id_customer'=>Session::get('id_customer')]);
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
