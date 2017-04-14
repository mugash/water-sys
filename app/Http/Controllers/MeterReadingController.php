<?php

namespace App\Http\Controllers;

use App\MeterReading;
use App\Client;
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
    /**
    *Render the form to add a new meter reading
     * @return \Response
     */
    public function create()
    {
        $clients = Client::all();
        return view('meteter_readings.add', ['clients' => $clients]);
    }
    /**
    *Store new meter reading
     * @param Request $request
     * @return \Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'client_id' => 'required',
            'read_date' => 'required',
            'reading' => 'required'
        ]);
        MeterReading::create([
            'client_id' => $request['client_id'],
            'read_date' => $request['read_date'],
            'reading' => $request['reading']
        ]);
        return redirect('meter_reading_list');
    }
    /**
     *return details for a certain meter reading
     * @param MeterReading $reading
     * @return \Response
     */
    public function reading(MeterReading $reading)
    {
        return view('meteter_readings.reading',['reading' => $reading]);
    }
}