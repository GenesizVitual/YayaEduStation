<?php
namespace App\Http\Controllers\Main\System\data;
use App\Http\Controllers\utils\RenderParsial;
use App\Models\MessageModel;
use Session;
class Chat
{
    public function list_customer_chat(){
        if(!empty(Session::get('id_users'))){
            $customer_chat = MessageModel::all()->where('to_id', Session::get('id_users'))->sortByDesc('created_at')
                ->groupBy('from_id');
        }

        if(!empty(Session::get('id_customer'))){
            $customer_chat = MessageModel::all()->where('from_id', Session::get('id_customer'))->sortByDesc('created_at')
                ->groupBy('from_id');
        }
        return ['customer_chat'=> $customer_chat];
    }

    public function message($req){
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


    public function data_message($no_unique){
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
        $array_pass = ['data'=>$container, 'uid'=> $n_model->no_unique,'to_id'=> $n_model->from_id,'id_kursus'=>$n_model->id_kursus];
        return $array_pass;
    }

    public function data_message_customer($req){
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
        $array_pass = ['data'=>$container,'id_customer'=>Session::get('id_customer')];
        return $array_pass;
    }


}
