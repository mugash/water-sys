<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MeterReading;
use App\Billing;

class BillingController extends Controller
{
    /**
     *Create a new Billing Controller and authenticate all its requests
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
    *Display all the unpaid bills
     * @return \Response
     */
    public function index()
    {
        $bills = Billing::where('balance', '>', 0)
                ->orderBy('Balance')
                ->get();
        return view('bills.index', ['bills' => $bills]);
    }
    /**
    *Render the form to record a new bill
     *@return \Response
     */
    public function create()
    {
        $readings = MeterReading::all();
        return view('bills.create', ['readings' => $readings]);
    }
}

