<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    protected $table = 'jasa';
    protected $fillable = [
        'user_id',
        'kode_jasa',
        'nama_jasa',
        'slug_jasa',
        'deskripsi_jasa',
        'foto',
        'jumlah',
        'harga',
        'status',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function images() {
        return $this->hasMany('App\Models\JasaImage', 'jasa_id');
    }
}
