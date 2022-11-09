<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JasaImage extends Model
{
    protected $fillable = [
        'jasa_id',
        'foto',
    ];

    public function jasa() {
        return $this->belongsTo('App\Models\Jasa','jasa_id');
    }
}
