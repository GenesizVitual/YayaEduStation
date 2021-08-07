<?php


namespace App\Http\Controllers\Main\Customer\data;

use App\Models\Booking;

class DetailBooking
{
    private $id_booking = 0;

    public function __construct($id_booking)
    {
        $this->id_booking = $id_booking;
    }

    public function data()
    {
        $array = [
            'booking' => $this->booking()
        ];
        return $array;
    }

    private function booking()
    {
        $booking = Booking::findOrFail($this->id_booking);
        return $booking;
    }
}
