<?php
/**
 * Created by PhpStorm.
 * User: Fandiansyah
 * Date: 13/08/2020
 * Time: 14:55
 */

namespace App\Http\Controllers\utils;
use View;

class RenderParsial
{
    public static function render_partial($view,$array){
        return (string)View::make($view, array('pembelajaran'=>$array));
    }

    public static function render_partial_chat($view,$array){
        return (string)View::make($view, array('data'=>$array));
    }

    public static function render_bookings($view,$array){
        return (string)View::make($view, array('booking'=>$array));
    }

    public static function render_view($view,$array){
        return (string)View::make($view, $array);
    }
}
