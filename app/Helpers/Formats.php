<?php

namespace App\Helpers;

class Formats
{
    public static function customDate($date)
    {
        //return date('F d, Y', strtotime($date));
        return date('d M Y', strtotime($date));
    }

    public static function customTimestamp($timestamp)
    {
        return date('d/m/Y h:i A', strtotime($timestamp));
    }

    public static function customDateTime($timestamp)
    {
        return date('d M Y, h:i a', strtotime($timestamp));
    }

}

