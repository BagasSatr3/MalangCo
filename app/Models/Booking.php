<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $fillable = [
        'user_id',
        'no_invoice',   
        'status_booking',
        'status_pembayaran',
        'subtotal',
        'ongkir',
        'diskon',
        'total',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function user() {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function detail() {
        return $this->hasMany('App\Models\BookingDetail', 'booking_id');
    }

    public function updatetotal($booking, $subtotal) {
        $this->attributes['subtotal'] = $booking->subtotal + $subtotal;
        $this->attributes['total'] = $booking->total + $subtotal;
        self::save();
    }
}