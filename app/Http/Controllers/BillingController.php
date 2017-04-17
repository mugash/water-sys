<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Client;
use App\MeterReading;
use App\Payment;
use Illuminate\Http\Request;
use App\Setting;

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
     *generate random alphanumeric
     * @param $size
     * @return string
     */
    public function random_num($size)
    {
        $alpha_key = '';
        $keys = range('A', 'Z');

        for ($i = 0; $i < 2; $i++) {
            $alpha_key .= $keys[array_rand($keys)];
        }

        $length = $size - 2;

        $key = '';
        $keys = range(0, 9);

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $alpha_key . $key;
    }

    /**
     *Display all the unpaid bills
     * @return \Response
     */
    public function index()
    {
        $bills = Billing::where('bill_balance', '>', 0)
            ->orderBy('bill_balance')
            ->get();
        return view('bills.index', ['bills' => $bills,'index' => 0]);
    }

    /**
     *Render the form to record a new bill
     * @return \Response
     */
    public function create()
    {
        $readings = MeterReading::all();
        return view('bills.create', ['readings' => $readings]);
    }

    /**
     *Store the recorded bill
     * @param Request $request
     * @return \Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'meter_reading_id' => 'required|numeric',
            'bill_deadline' => 'required'
        ]);
        $settings = Setting::find(1);
        $meter_reading = MeterReading::find($request['meter_reading_id']);
        $bill_amount = $settings->price_per_unit * $meter_reading->meter_reading;
        $bill_number = $this->random_num(10);
        $bill = Billing::create([
            'meter_reading_id' => $request['meter_reading_id'],
            'bill_number' => $bill_number,
            'bill_amount' => $bill_amount,
            'bill_deadline' => $request['bill_deadline'],
            'bill_balance' => $bill_amount
        ]);
        flash('Created the bill successfully');
        return redirect('/bills/' . $bill->id);
    }

    /**
     * Retrieve a certain bill
     * @param Billing $bill
     * @return \Response
     */
    public function bill(Billing $bill)
    {
        return view('bills.bill', ['bill' => $bill]);
    }

    /**
     *Render a form to update a certain bill
     * @param Billing $bill
     * @return \Response
     */
    public function update(Billing $bill)
    {
        $readings = MeterReading::all();
        return view('bills.update', ['bill' => $bill, 'readings' => $readings]);
    }

    /**Store an updated bill
     * @param Request $request
     * @return \Response
     */
    public function store_updated(Request $request)
    {
        $this->validate($request, [
            'meter_reading_id' => 'required|numeric',
            'price' => 'required|numeric',
            'bill_deadline' => 'required'
        ]);
        $meter_reading = MeterReading::find($request['meter_reading_id']);
        $bill_amount = $request['price'] * $meter_reading->meter_reading;
        $bill = Billing::find($request['id']);
        $payments = Payment::where('billing_id', $bill->id);
        $sum = 0;
        if ($payments) {
            foreach ($payments as $payment) {
                $sum += $payment->amount;
            }
        }
        $bill_balance = $bill_amount - $sum;
        $bill->meter_reading_id = $request['meter_reading_id'];
        $bill->bill_amount = $bill_amount;
        $bill->bill_deadline = $request['bill_deadline'];
        $bill->bill_balance = $bill_balance;
        $bill->save();
        flash('Updated the bill successfully');
        return redirect('bills/' . $bill->id);
    }

    /**
     * Return bills for a certain meter bill_number
     * @param Request $request
     * @return \Response
     */
    public function bills_by_meter_bill_number(Request $request)
    {
        $meter_reading = $request['meter_reading'];
        $client = Client::find($meter_reading);
        return view('meteter_readings.index');
    }
}

