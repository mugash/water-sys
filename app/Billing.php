<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    /*
     * Mass assignable fields
     * */
    protected $fillable = [
        'meter_reading_id', 'number', 'amount', 'deadline', 'balance'
    ];
    /*
     * Get the client for the bill
     * */
    public function meter_reading()
    {
        return $this->belongsTo('App\MeterReading');
    }

    /*
     * Get Payments for the bill
     * */
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}
