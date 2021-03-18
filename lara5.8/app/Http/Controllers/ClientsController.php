<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function list() {
        $clients = Client::where('status', '=',1)->get();

    return view('clients.index', [
        'clients' => $clients
    ]);
    }

  
    public function store() {
        request()->validate([
            'pseudo'=> 'required|min:3',
            'email' => 'required|email',
            'status'=> 'required|integer'
            ]);

        $pseudo = request('pseudo');
        $email = request('email');
        $status = request('status');
        $client = new CLient();
        $client->name = $pseudo;
        $client->email = $email;
        $client->status = $status;
        $client->save();
        return back();
    }
}
