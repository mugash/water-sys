<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Excel;

class ClientsController extends Controller
{
    /**
     * Create new client controller and one must be authenticated
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display all the clients in the company
     *
     * @return \Response
     */
    public function index()
    {
        $clients = Client::where('active', 1)
            ->orderBy('id', 'desc')
            ->get();
        return view('clients.index', ['clients' => $clients, 'title' => 'List Clients','index'=>0]);
    }

    /**
     * Display details for a certain client
     *
     * @param Request $request
     * @return \Response
     */
    public function client(Client $client)
    {
        return view('clients.client', ['client' => $client]);
    }

    /**
     * Display the form to add a new client
     *
     * @return \Response
     */
    public function create()
    {
        return view('clients.create', ['title' => 'Add Client']);
    }

    /**
     *Create new Client
     *
     * @param Request $request
     * @return client list
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'clients_first_name' => 'required|max:255',
            'clients_last_name' => 'required|max:255',
            'clients_phone_number' => 'required',
            'clients_plot_number' => 'required',
            'clients_address' => 'required',
            'clients_meter_number' => 'required|unique:clients|max:10'
        ]);

        Client::create([
            'clients_first_name' => $request['clients_first_name'],
            'clients_last_name' => $request['clients_last_name'],
            'clients_phone_number' => $request['clients_phone_number'],
            'clients_plot_number' => $request['clients_plot_number'],
            'clients_address' => $request['clients_address'],
            'clients_meter_number' => $request['clients_meter_number']
        ]);
        flash('Client Saved!');
        return redirect('clients');
    }

    /**
     * Display the update form with values already supplied
     *
     * @params Client $client
     * @return \Response
     */
    public function update(Client $client)
    {
        return view('clients.update', ['client' => $client]);
    }

    /**
     *Save Updated client
     * @param Request $request
     * @return \Response
     */
    public function save_client(Request $request)
    {
        $this->validate($request, [
            'clients_first_name' => 'required|max:255',
            'clients_last_name' => 'required|max:255',
            'clients_phone_number' => 'required',
            'clients_plot_number' => 'required',
            'clients_address' => 'required'
        ]);
        $client = Client::find($request['id']);
        if ($client->clients_meter_number != $request['clients_meter_number']){
            $this->validate($request, [
                'clients_meter_number' => 'required|unique:clients|max:10'
            ]);
        }
        $client->clients_first_name = $request['clients_first_name'];
        $client->clients_last_name = $request['clients_last_name'];
        $client->clients_phone_number = $request['clients_phone_number'];
        $client->clients_plot_number = $request['clients_plot_number'];
        $client->clients_address = $request['clients_address'];
        if ($client->clients_meter_number != $request['clients_meter_number']){
            $client->clients_meter_number = $request['clients_meter_number'];
        }
        $client->save();
        flash('Client Updated!');
        return redirect('clients/' . $client->id);
    }

    /**
     *Mark status active to false after the user is deleted
     * @param Client $client
     * @return \Response
     */
    public function destroy(Client $client)
    {
        $selected_client = $client;
        $selected_client->active = false;
        $selected_client->save();
        flash('Client Deleted!');
        return redirect('clients');
    }
        /**
     *File to export Excel
     *@param Request $request
     * @param $type
     *@return \Response
     */
    public function downloadExcel(Request $request,$type)
    {
        $data = Client::get()->toArray();
        return Excel::create('water_system_clients', function($excel) use ($data) {
            $excel->sheet('ClientsSheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
}
