<?php

namespace App\Http\Controllers;

use App\MeterReading;
use Illuminate\Http\Request;

class MeterReadingController extends Controller
{
    /**
    *Create a new meter reading controller and must be authenticated to access
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    *Return all the meter readings
     *@return \Response
     */
    public function index()
    {
        $meter_readings = MeterReading::all();
        return view('meteter_readings.index', ['meter_readings' => $meter_readings]);
    }
}