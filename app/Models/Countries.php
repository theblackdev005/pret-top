<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{

    public static function get()
    {
        $data[] = "Albania";
        $data[] = "Andorra";
        $data[] = "Armenia";
        $data[] = "Austria";
        $data[] = "Belarus";
        $data[] = "Belgium";
        $data[] = "Bosnia and Herzegovina";
        $data[] = "Bulgaria";
        $data[] = "Croatia (Hrvatska)";
        $data[] = "Cyprus";
        $data[] = "Czech Republic";
        $data[] = "Denmark";
        $data[] = "Estonia";
        $data[] = "Finland";
        $data[] = "France";
        $data[] = "Georgia";
        $data[] = "Germany";
        $data[] = "Greece";
        $data[] = "Hungary";
        $data[] = "Iceland";
        $data[] = "Ireland";
        $data[] = "Italy";
        $data[] = "Jersey";
        $data[] = "Latvia";
        $data[] = "Liechtenstein";
        $data[] = "Lithuania";
        $data[] = "Luxembourg";
        $data[] = "Macedonia";
        $data[] = "Malta";
        $data[] = "Moldova, Republic of";
        $data[] = "Monaco";
        $data[] = "Montenegro";
        $data[] = "Netherlands";
        $data[] = "Norway";
        $data[] = "Poland";
        $data[] = "Portugal";
        $data[] = "Romania";
        $data[] = "Russian Federation";
        $data[] = "San Marino";
        $data[] = "Serbia";
        $data[] = "Slovakia";
        $data[] = "Slovenia";
        $data[] = "Spain";
        $data[] = "Sweden";
        $data[] = "Switzerland";
        $data[] = "Turkey";
        $data[] = "Ukraine";
        $data[] = "United Kingdom";
        $data[] = "Vatican City State";

        return $data;
    }
}
