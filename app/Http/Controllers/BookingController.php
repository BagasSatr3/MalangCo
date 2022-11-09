<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\AlamatPengiriman;
use App\Models\Order;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemuser = $request->user();//ambil data user
        $booking = Booking::where('user_id', $itemuser->id)
                        ->where('status_booking', 'booking')
                        ->first();
        if ($booking) {
            $data = array('title' => 'Booking Date',
                        'booking' => $booking);
            return view('booking.index', $data)->with('no', 1);            
        } else {
            return abort('404');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function sewa(Request $request) {
        $itemuser = $request->user();
        $booking = Booking::where('user_id', $itemuser->id)
                        ->where('status_booking', 'booking')
                        ->first();
        $itemalamatpengiriman = AlamatPengiriman::where('user_id', $itemuser->id)
                                                ->where('status', 'utama')
                                                ->first();
        if ($booking) {
            $data = array('title' => 'Penyewaan',
                        'booking' => $booking,
                        'itemalamatpengiriman' => $itemalamatpengiriman);
            return view('booking.sewa', $data)->with('no', 1);
        } else {
            return abort('404');
        }
    }
}
