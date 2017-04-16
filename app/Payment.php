<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /*
     * mass assignable fields
     * */
    protected $fillable = ['billing_id', 'date', 'amount', 'type'];
    /*
     * Get the Bill for payment
     * */
    public function billing()
    {
        return $this->belongsTo('App\Billing');
    }
}
