<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    public function Cliente() {
    return $this->belongsTo('App\Models\Cliente');
    }
}
