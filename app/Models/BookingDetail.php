<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    protected $table = 'booking_details';
    protected $fillable = [
        'jasa_id',
        'booking_id',
        'start_date',
        'end_date',
        'harga',
        'subtotal',
    ];

    public function booking() {
        return $this->belongsTo('App\Models\Booking', 'booking_id');
    }

    public function jasa() {
        return $this->belongsTo('App\Models\Jasa', 'jasa_id');
    }

    // function untuk update qty, sama subtotal
    public function updatedetail($itemdetail,$harga) {
        $this->attributes['subtotal'] = $itemdetail->subtotal;
        self::save();
    }
}
