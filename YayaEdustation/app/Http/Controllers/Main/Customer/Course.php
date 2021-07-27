<?php

namespace App\Http\Controllers\Main\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Kursus;
class Course extends Controller
{
    public function index() {
        Session::put('menu','course');
        $course = [
            'course'=> Kursus::all()
        ];
        return view('webview.courses', $course);
    }

    public function show($id_course){
        Session::put('menu','course');
        $course = [
            'course'=> Kursus::findOrFail($id_course)
        ];
        return view('webview.screen.courses.course-details', $course);
    }


}
