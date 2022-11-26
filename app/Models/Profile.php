<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = "setting_devs";
    protected $fillable = [
        'foto',
        'name_dev',
        'job_dev',
        'desc',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
