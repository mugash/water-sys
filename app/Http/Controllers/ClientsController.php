<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Create new client controller
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
     * @return Response
     */
    public function index()
    {
        $clients = Client::where('active', 1)
            ->orderBy('id', 'desc')
            ->get();
        return view('clients.index', ['clients' => $clients, 'title' => 'List Clients']);
    }

    /**
     * Display details for a certain client
     *
     * @param Request $request
     * @return Response
     */
    public function client(Client $client)
    {
        return view('clients.client', ['client' => $client]);
    }

    /**
     * Display the form to add a new client
     *
     * @return Response
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone_number' => 'required',
            'plot_number' => 'required',
            'address' => 'required',
            'meter_number' => 'required|unique:clients|max:10'
        ]);

        Client::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone_number' => $request['phone_number'],
            'plot_number' => $request['plot_number'],
            'address' => $request['address'],
            'meter_number' => $request['meter_number']
        ]);
        return redirect('clients');
    }

    /**
     * Display the update form with values already
     *
     * @params Client $client
     * @return Response
     */
    public function update(Client $client)
    {
        return view('clients.update', ['client' => $client]);
    }

    /**
     *Save Updated client
     * @param Request $request
     * @return Response
     */
    public function save_client(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone_number' => 'required',
            'plot_number' => 'required',
            'address' => 'required',
            'meter_number' => 'required|unique:clients|max:10'
        ]);
        $client = Client::find($request['id']);
        $client->first_name = $request['first_name'];
        $client->last_name = $request['last_name'];
        $client->phone_number = $request['phone_number'];
        $client->plot_number = $request['plot_number'];
        $client->address = $request['address'];
        $client->meter_number = $request['meter_number'];
        $client->save();
        return redirect('clients/' . $client->id);
    }

    /**
     *Mark status active to false after the user is deleted
     * @param Client $client
     * @return redirect()
     */
    public function destroy(Client $client)
    {
        $selected_client = $client;
        $selected_client->active = false;
        $selected_client->save();
        return redirect('clients');
    }
}
