<?php

namespace App\Http\Controllers\Main\Customer\data;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Date;
use phpDocumentor\Reflection\Types\Self_;
use Session;
use function GuzzleHttp\Psr7\str;

class Schedule
{
    //

    public $jumlah_pertemuan;

    public $schedule_key = [
        'Sun' => 'minggu',
        'Mon' => 'senin',
        'Tue' => 'selasa',
        'Wed' => 'rabu',
        'Thu' => 'kamis',
        'Fri' => 'jumat',
        'Sat' => 'sabtu',
    ];

    public function data($array) // find data one data
    {
        $booking_schedule = Booking::where('id_cs', Session::get('id_customer'))->findOrFail($array['id_booking']);
        $array_date = $this->getAllDayOnCurrentMonth();
        $day_detect = $this->searchEvent($booking_schedule);
        $schedule = $this->setSchedule($array_date, $day_detect);
        return $schedule;
    }

    public function data_schedule()
    {
        if(!empty(Session::get('id_customer'))){
            $booking_schedule = Booking::all()->where('id_cs', Session::get('id_customer'));
        }
        if(!empty(Session::get('id_users'))){
            $booking_schedule = Booking::all()->where('id_tutor', Session::get('id_users'));
        }
        $array_date = $this->getAllDayOnCurrentMonth();
        $data_schedule = [];
        foreach ($booking_schedule as $data_booking) {
            $day_detect = $this->searchEvent($data_booking);
            $schedule = $this->setSchedule($array_date, $day_detect, 'aktif');
            $data_schedule[] = $schedule;
        }
        $data = $this->reStructur($data_schedule);
        return $data;
    }

    private function reStructur($dataArray)
    {
        $container = [];
        foreach ($dataArray as $key => $data) {
            foreach ($data as $item) {
                $container[] = $item;
            }
        }
        return $container;
    }

    private function getAllDayOnCurrentMonth()
    {
        $begin_date = date('Y-m-01');
        $end_date = date('Y-m-t');
        $calender = [];
        $end_day = explode('-', $end_date)[2];
        for ($i = 1; $i <= (int)$end_day; $i++) {
            $n_date = date($i . '-m-Y');
            $colomn = [
                'day_num' => date('d', strtotime($n_date)),
                'day_name' => date('D', strtotime($n_date)),
                'date' => date('Y-m-d', strtotime($n_date)),
            ];
            $calender[] = $colomn;
        }
        return $calender;
    }

    private function searchEvent($booking_model)
    {
        $data = [];
        if (!empty($booking_model)) {
            foreach ($this->schedule_key as $key => $value) {
                if ($booking_model->$value != null) {
                    $data[$key]['status'] = true;
                    $data[$key]['time'] = $booking_model->$value;
                    $data[$key]['pelajaran'] = $booking_model->linkToKursus->linkToPembelajaran->pelajaran;
                    $data[$key]['durasi'] = $booking_model->durasi;
                    $data[$key]['id'] = $booking_model->id;
                } else {
                    $data[$key]['status'] = false;
                    $data[$key]['time'] = '';
                    $data[$key]['pelajaran'] = $booking_model->linkToKursus->linkToPembelajaran->pelajaran;
                    $data[$key]['id'] = $booking_model->id;
                }
            }
        }
        return $data;
    }

    private function setSchedule($array_day, $day_detect, $action = null)
    {
        $collection = [];
        $index = 1;
        foreach ($array_day as $key => $data) {
            if ($day_detect[$data['day_name']]['status'] == 'true') {
                $obj = new \stdClass();
                $obj->id = $day_detect[$data['day_name']]['id'];
                $obj->index = $index++;
                $obj->description = $data['day_name'];
                $obj->title = 'Jadwal Les Private ' . $day_detect[$data['day_name']]['pelajaran'];

                if ($action != 'aktif') {
                    $this->jumlah_pertemuan++;
                    $obj->start = $data['date'];
                    $obj->rendering = 'background';
                } else {
                    $obj->start = $data['date'] . ' ' . $day_detect[$data['day_name']]['time'];
                    $data_start_hours = date('H:i', strtotime($obj->start));
                    $duration = explode(':', date('H:i', strtotime($day_detect[$data['day_name']]['durasi'])));
                    $hours = $duration[0];
                    $menit = $duration[1];
                    $end = date('Y-m-d H:i', strtotime($obj->start . ' +' . $hours . ' hours +' . $menit . ' minutes'));
                    $obj->end = $end;
                }
                $obj->color = '#17a2b8';
                $collection[] = $obj;
            }
        }
        return $collection;
    }
}
