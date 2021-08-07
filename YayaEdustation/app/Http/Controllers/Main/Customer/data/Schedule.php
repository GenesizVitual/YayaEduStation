<?php

namespace App\Http\Controllers\Main\Customer\data;
use Illuminate\Http\Request;
use App\Models\Booking;
use Session;
use function GuzzleHttp\Psr7\str;

class Schedule
{
    //

    private $schedule_key = [
        'Sunday'=>'miggu',
        'Monday'=>'senin',
        'Tuesday'=>'selasa',
        'Wednesday'=>'rabu',
        'Thursday'=>'kamis',
        'Friday'=>'jumat',
        'Saturday'=>'sabtu',
    ];

    public function data($array)
    {
        $booking_schedule = Booking::where('id_cs', Session::get('id_customer'))->findOrFail($array['id_booking']);
        $array_date = $this->getAllDayOnCurrentMonth();
        $day_detect = $this->searchEvent($booking_schedule);
        $schedule = $this->setSchedule($array_date, $day_detect);
        return $schedule;
    }

    private function getAllDayOnCurrentMonth()
    {
        $begin_date = date('Y-m-01');
        $end_date = date('Y-m-t');
        $calender=[];
        $end_day = explode('-', $end_date)[2];
        for($i = 1; $i <= (int)$end_day; $i++){
            $n_date = date($i.'-m-Y');
            $colomn = [
                'day_num'=> date('d', strtotime($n_date)),
                'day_name'=> date('l', strtotime($n_date)),
                'date'=> date('Y-m-d', strtotime($n_date)),
            ];
            $calender[] = $colomn;
        }
        return $calender;
    }

    private function searchEvent($booking_model){
        $data=[];
        if(!empty($booking_model)){
            if($booking_model->senin !=null){
                $data['Monday']['status'] = true;
                $data['Monday']['id'] = $booking_model->id;
            }else{
                $data['Monday']['status'] = false;
                $data['Monday']['id'] = $booking_model->id;
            }

            if($booking_model->selasa !=null){
                $data['Tuesday']['status'] = true;
                $data['Tuesday']['id'] = $booking_model->id;
            }else{
                $data['Tuesday']['status']= false;
                $data['Tuesday']['id'] = $booking_model->id;
            }

            if($booking_model->rabu !=null){
                $data['Wednesday']['status'] = true;
                $data['Wednesday']['id'] = $booking_model->id;
            }else{
                $data['Wednesday']['status'] = false;
                $data['Wednesday']['id'] = $booking_model->id;
            }

            if($booking_model->kamis !=null){
                $data['Thursday']['status'] = true;
                $data['Thursday']['id'] = $booking_model->id;
            }else{
                $data['Thursday']['status'] = false;
                $data['Thursday']['id'] = $booking_model->id;
            }

            if($booking_model->jumat !=null){
                $data['Friday']['status'] = true;
                $data['Friday']['id'] = $booking_model->id;
            }else{
                $data['Friday']['status'] = false;
                $data['Friday']['id'] = $booking_model->id;
            }

            if($booking_model->sabtu !=null){
                $data['Saturday']['status'] = true;
                $data['Saturday']['id'] = $booking_model->id;
            }else{
                $data['Saturday']['status'] = false;
                $data['Saturday']['id'] = $booking_model->id;
            }

            if($booking_model->minggu !=null){
                $data['Sunday']['status'] = true;
                $data['Sunday']['id'] = $booking_model->id;
            }else{
                $data['Sunday']['status']= false;
                $data['Sunday']['id'] = $booking_model->id;
            }
        }
        return $data;
    }

    private function setSchedule($array_day,$day_detect){
        $collection = [];
        foreach ($array_day as $key=> $data){
            if($day_detect[$data['day_name']]['status'] == 'true'){
                $obj = new \stdClass();
                $obj->id = $day_detect[$data['day_name']]['id'];
                $obj->title = 'Jadwal Les Private';
                $obj->start = $data['date'];
                $obj->rendering = 'background';
                $obj->color = '#17a2b8';
                $collection[] = $obj;
            }
        }
         return $collection;
    }
}
