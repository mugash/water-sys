<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Create a new Payment Controller and authenticate it
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display all the payments
     * @return \Response
     */
    public function index()
    {
        $payments = Payment::orderBy('payment_date')->get();
        return view('payments.index', ['payments' => $payments]);
    }

    /**
     *Render a form to add a payment
     * @return \Response
     */
    public function create()
    {
        $bills = Billing::all();
        return view('payments.create', ['bills' => $bills]);
    }

    /**
     *Store the added payment
     * @param Request $request
     * @return \Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'billing_id' => 'required|numeric',
            'payment_amount' => 'required|numeric',
            'payment_date' => 'required',
            'payment_type' => 'required'
        ]);
        $sum = 0;
        $bill = Billing::find($request['billing_id']);
        foreach ($bill->payments as $payment) {
            $sum += $payment->payment_amount;
        }
        $balance = $bill->bill_amount - $sum;
        if ($balance > 0) {
            $bill->bill_balance = $bill->bill_balance - $request['payment_amount'];
            $bill->save();
            Payment::create([
                'billing_id' => $request['billing_id'],
                'payment_date' => $request['payment_date'],
                'payment_amount' => $request['payment_amount'],
                'payment_type' => $request['payment_type']
            ]);
            flash('Payment made successfully. New Balance is '.$bill->bill_balance)->important();
            return redirect('payments');
        }
        flash('Sorry that bill has already been paid', 'danger')->important();
        return redirect('payments');
    }

    /**
     *Get details for a certain payment
     * @param Payment $payment
     * @return \Response
     */
    public function payment(Payment $payment)
    {
        return view('payments.payment', ['payment' => $payment]);
    }
    /**
    *Update payment
     *@return \Response
     */
    public function update()
    {
        $bills = Billing::all();
    }

    /**
     *Store the updated payment
     * @param Request $request
     * @return \Response
     */
    public function store_edit(Request $request)
    {
        $this->validate($request, [
            'billing_id' => 'required|numeric',
            'payment_amount' => 'required|numeric',
            'payment_date' => 'required',
            'payment_type' => 'required'
        ]);
        $sum = 0;
        $bill = Billing::find($request['billing_id']);
        foreach ($bill->payments as $payment) {
            $sum += $payment->payment_amount;
        }
        $payment = Payment::find($request['id']);
        $balance = $bill->payment_amount - $sum;
        if ($balance > 0) {
            $bill->balance = $bill->balance - $request['payment_amount'];
            $bill->save();
            $payment->billing_id = $request['billing_id'];
            $payment->payment_amount = $request['payment_amount'];
            $payment->payment_date = $request['payment_date'];
            $payment->payment_type = $request['payment_type'];
            $payment->save();
            return redirect('/payment' . $payment->id);
        }
        return redirect('/payment' . $payment->id);
    }

}
