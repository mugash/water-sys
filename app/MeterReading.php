<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeterReading extends Model
{
    /*
     * mass assignable fields
    */
    protected $fillable = ['client_id', 'read_date', 'reading'];

    /**
     * Get the client who own a meter reading
     */
    public function client()
    {
        return $this->belongsTo('App\Client');
    }

}
