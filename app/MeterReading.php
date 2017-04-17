<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeterReading extends Model
{
    /*
     * mass assignable fields
    */
    protected $fillable = ['client_id', 'meter_read_date', 'meter_reading'];

    /**
     * Get the client who own a meter reading
     */
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
    /*
     * Get Billings
     * */
    public function billings()
    {
        return $this->hasMany('App\Billing');
    }


}
