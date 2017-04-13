<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

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
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clients = Client::orderBy('id', 'desc')
                           ->get();
        return view('clients.index', ['clients' => $clients, 'title' => 'List Clients']);
    }
    /**
    Display details for a certain client
     *
     @param Request $request
     @return Response
     */
    public function client(Client $client)
    {
        return view('clients.client', ['client' => $client]);
    }
    /**
    Display the form to add a new client
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
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
            'meter_number' => 'required'
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
}
