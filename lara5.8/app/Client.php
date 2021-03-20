<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {
    protected $guarded = [];
    protected $attibruts = [
        'status' => '0'
    ];

    public function scopeStatus($query) {
        return $query->where('status', 1)->get();
    }

    public function entreprise() {
        return $this->belongsTo('App\Entreprise');
    }

    public function getStatus($attributs) {
        return $this->getStatusOptions()[$attributs];
            
    }

    public function getStatusOptions() {
         return [
            '0' => 'Inactif',
            '1' => 'Actif',
            '2' => 'En attente'
         ];
    }
}
