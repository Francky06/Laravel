<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {
    protected $guarded = [];

    public function scopeStatus($query) {
        return $query->where('status', 1)->get();
    }

    public function entreprise() {
        return $this->belongsTo('App\Entreprise');
    }

    public function getStatus($attributs) {
        return [
            '0' => 'inactif',
            '1' => 'actif'
        ][$attributs];
    }
}
