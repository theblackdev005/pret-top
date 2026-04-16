<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currencies extends Model
{
    public static function get()
    {
        return [
            'USD',
            'EUR',
            'CHF',
            'CAD',
            'XPF',
            'GPB',
        ];
    }
}
