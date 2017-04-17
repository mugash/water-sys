<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
    *Create a new settings controller and pass it through auth middleware
     *@return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**Update settings values
     *@return \Response
     */
    public function update()
    {
        $settings = Setting::firstOrCreate(['id' => 1]);
        return view('settings.update',['settings'=>$settings]);
    }
    /**
    *Store the updated settings
     *@param Request $request
     *@Return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'numeric',
            'price' => 'required'
        ]);
        $settings = Setting::find($request['id']);
        $settings->price_per_unit = $request['price'];
        $settings->save();
        flash('Settings updated successfully');
        return redirect('settings');
    }
}
