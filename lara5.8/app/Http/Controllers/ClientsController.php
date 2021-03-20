<?php

namespace App\Http\Controllers;

use App\Client;
use App\Entreprise;
use Illuminate\Http\Request;

class ClientsController extends Controller {

    public function index() {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }
/* 
    return view('clients.index', [
        'clients' => $clients,
        'entreprises' => $entreprises
    ]);
    }
*/

    public function create() {
        $entreprises = Entreprise::all();
        return view('clients.create', compact('entreprises'));
    }

    public function store() {
        $data = request()->validate([
            'name'=> 'required|min:3',
            'email' => 'required|email',
            'status'=> 'required|integer',
            'entreprise_id'=> 'required|integer'
            ]);

        Client::create($data); 
        return back();
    }

    public function show(Client $client) {
 //       $client = Client::where('id', $client)->firstOrFail();
        return view('clients.show', compact('client'));
    }
}
