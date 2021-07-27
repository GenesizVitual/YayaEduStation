<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageModel extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $guarded=[];

    public function linkToIdUser(){
        return $this->belongsTo('App\Models\User', 'from_id');
    }

    public function linkFromIdUser(){
        return $this->belongsTo('App\Models\User', 'to_id');
    }
}
