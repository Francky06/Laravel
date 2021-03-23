<?php

namespace App\Http\Controllers;

use App\Client;
use App\Entreprise;
use Illuminate\Http\Request;

class ClientsController extends Controller {

    public function __construct() {
        // only ou except
        $this->middleware('auth')->except(['index']);
    }

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
        $client = new Client();
        $entreprises = Entreprise::all();
        return view('clients.create', compact('entreprises', 'client'));
    }

    public function store() {
        // validator
        /*
        $data = request()->validate([
            'name'=> 'required|min:3',
            'email' => 'required|email',
            'status'=> 'required|integer',
            'entreprise_id'=> 'required|integer'
            ]);
        */

        $client = Client::create($this->validator()); 
        $this->storeImage($client);
        return redirect('clients');
    }

    public function show(Client $client) {      
  //    $client = Client::find($client);
  //    $client = Client::where('id', $client)->firstOrFail();
        return view('clients.show', compact('client'));
    }


    public function edit(Client $client) {
        $entreprises = Entreprise::all();
        return view('clients.edit', compact('client', 'entreprises'));
    }

    public function update(Client $client) {
            $client->update($this->validator());
            $this->storeImage($client);
            return redirect('clients/' . $client->id);
    }

    public function destroy(Client $client) {
            $client->delete();
            return redirect('clients');
    }

    private function validator() {
        return $data = request()->validate([
            'name'=> 'required|min:3',
            'email' => 'required|email',
            'status'=> 'required|integer',
            'entreprise_id'=> 'required|integer',
            'image.*' => 'sometimes|image|mimes:jpg,jpeg,gif,png|max:5000'
            ]);
    }

    private function storeImage(Client $client) {
        if(request('image')) {
            $client->update([
                //créez dossier avatars dans public et store
                'image' => request('image')->store('avatars', 'public'),
            ]);
        }
    }
}
