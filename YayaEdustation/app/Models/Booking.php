<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function linkToCustomer(){
        return $this->belongsTo('App\Models\User','id_cs');
    }

    public function linkToTutor(){
        return $this->belongsTo('App\Models\User','id_tutor');
    }

    public function linkToKursus(){
        return $this->belongsTo('App\Models\Kursus','id_kursus');
    }

    public function linkToMannyMateri(){
        return $this->hasMany('App\Models\Materi','id_kursus','id_kursus');
    }
}
