<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function search_tutor(Request $req){
        $array = [
            'day'=>[
                "","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu", "Minggu"
            ],
            'time'=>[
                ['Pagi','08.00-12.00'],
                ['Siang','12.00-18.00'],
                ['Sore','18.00-24.00'],
                ['Malam','00.00-06.00'],
            ]
        ];
        return view('webview.screen.Tutor.Trainers', $array);
    }
}
