<?php
/**
 * Created by PhpStorm.
 * User: Vandiansyah
 * Date: 4/9/2021
 * Time: 10:15 AM
 */

namespace App\Http\Controllers\utils;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail as regMail;
class EmailProsed
{
    public static $content;
    public static function sendingMail($email){
        Mail::to($email)->send(new regMail(self::$content));
        if (Mail::failures()) {
            return false;
        }else{
            return true;
        }
    }
}