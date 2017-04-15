<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /*
     * Attributes that are mass assignable
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone_number', 'plot_number', 'address', 'meter_number'
    ];

    /*
     * Get meter readings
     * */
    public function meter_readings()
    {
        return $this->hasMany('App\MeterReading');
    }
}
