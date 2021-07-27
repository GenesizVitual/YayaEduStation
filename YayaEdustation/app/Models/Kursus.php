<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function linkToPembelajaran(){
        return $this->belongsTo('App\Models\Pelajaran','id_pelajaran');
    }

    public function linkToProfile(){
        return $this->belongsTo('App\Models\ProfileTutor','id_users');
    }

    public function linkToUsers(){
        return $this->belongsTo('App\Models\User','id_users');
    }

    public function linkToMannyMateri(){
        return $this->hasMany('App\Models\Materi','id_kursus','id');
    }
}
