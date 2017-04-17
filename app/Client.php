<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /*
     * Attributes that are mass assignable
     */
    protected $fillable = [
        'clients_first_name', 'clients_last_name', 'clients_phone_number', 'clients_plot_number', 'clients_address', 'clients_meter_number'
    ];

    /*
     * Get meter readings
     * */
    public function meter_readings()
    {
        return $this->hasMany('App\MeterReading');
    }
}
