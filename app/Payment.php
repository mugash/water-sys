<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /*
     * mass assignable fields
     * */
    protected $fillable = ['billing_id', 'payment_date', 'payment_amount', 'payment_type'];
    /*
     * Get the Bill for payment
     * */
    public function billing()
    {
        return $this->belongsTo('App\Billing');
    }
}
