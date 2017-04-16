<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Client;
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
     * @return \Response
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
     * Render the form form to record a new meter reading and generate a bill
     * @return \Response
     */
    public function create_and_generate_bill()
    {
        $clients = Client::all();
        return view('meteter_readings.add_bill', ['clients' => $clients]);
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
        return redirect('readings');
    }

    /**
     *Store the recorded meter reading and generate a bill
     * @param Request $request
     * @return \Response
     */
    public function store_and_generate_bill(Request $request)
    {
        {
            $this->validate($request, [
                'client_id' => 'required',
                'read_date' => 'required',
                'reading' => 'required|numeric',
                'price' => 'required|numeric',
                'deadline' => 'required'
            ]);
            $meter_reading = MeterReading::create([
                'client_id' => $request['client_id'],
                'read_date' => $request['read_date'],
                'reading' => $request['reading']
            ]);
            //TODO generate a random 10 alphanumeric code and alphabet in caps
            $number = 'GHTBF545674';
            $amount = $request['price'] * $meter_reading->reading;
            $billing = Billing::create([
                'client_id' => $meter_reading->id,
                'number' => $number,
                'amount' => $amount,
                'deadline' => $request['deadline'],
                'balance' => $amount
            ]);
            //TODO return view for the newly generated bill
            return redirect('readings');
        }
    }

    /**
     *return details for a certain meter reading
     * @param MeterReading $reading
     * @return \Response
     */
    public function reading(MeterReading $reading)
    {
        return view('meteter_readings.reading', ['reading' => $reading]);
    }

    /**
     *Display the form to update the meter reading
     * @param MeterReading $reading
     * @return \Response
     */
    public function edit(MeterReading $reading)
    {
        $clients = Client::all();
        return view('meteter_readings.edit', ['reading' => $reading, 'clients' => $clients]);
    }

    /**
     *Store edited meter reading
     * @param Request $request
     * @return \Response
     */
    public function store_edited(Request $request)
    {
        $this->validate($request, [
            'client_id' => 'required',
            'read_date' => 'required',
            'reading' => 'required'
        ]);
        $reading = MeterReading::find($request['id']);
        $reading->client_id = $request['client_id'];
        $reading->read_date = $request['read_date'];
        $reading->reading = $request['reading'];
        $reading->save();
        return redirect('/readings/' . $reading->id);

    }
    /**
     *Find readings according to meter number
     * @param meter_number
     * @return \Response
     */
    //TODO pass arguments to a closure from the outer function statements in php
    public function readings_by_meter_number($meter_number)
    {
        $readings = MeterReading::whereHas('client', function ($query) {
            $query->where('meter_number', '=', 14567);
        })->get();
        return view('meteter_readings.index', ['meter_readings' => $readings]);
    }

    /**
     *Find readings from meter number submitted via form
     * @param Request $request
     * @return \Response
     */
    public function readings_by_meter_number_via_form(Request $request)
    {
        //TODO create an empty array
        $meter_reading = $request['meter_reading'];
        $readings = MeterReading::whereHas('client', function ($query) {
            $query->where('meter_number', '=', 14567);
        })->get();
        return view('meteter_readings.index', ['meter_readings' => $readings]);
    }
}