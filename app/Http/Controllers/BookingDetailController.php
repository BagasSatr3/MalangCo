<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingDetail;
use App\Models\Jasa;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BookingDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $dateTime = ['start_date', 'end'];
    public function index()
    {
        return abort('404');
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
        $this->validate($request, [
            'jasa_id' => 'required|unique:jasa',
            'booking_id' => 'required|unique:booking',
            'start_date' => 'required',
            'end_date' => 'required',
            'harga' => 'required|numeric',
            'subtotal' => 'required|numeric'
        ]);
        DB::beginTransaction();
        try {
            $itemjasa = Jasa::create([
                'jasa_id' => $request->jasa_id,
                'booking_id' => $request->booking_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'harga' => $request->harga,
                'subtotal' => $request->subtotal,
            ]);
            $bookingdetail->booking()->createMany($this->setFieldSchedules($request));
            return redirect()->route('homepage.');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd("Create failed:" . $th->getMessage());
        } finally {
            DB::commit();
        }
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
        $itemdetail = BookingDetail::findOrFail($id);
        $param = $request->param;
        
        if ($param == 'check') {
            $itemdetail->updatedetail($itemdetail, $itemdetail->start_time, $itemdetail->end_time);
            //
            return back()->with('success', 'Item berhasil diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemdetail = BookingDetail::findOrFail($id);
        // update total cart dulu
        $itemdetail->booking->updatetotal($itemdetail->booking, '-'.$itemdetail->subtotal);
        if ($itemdetail->delete()) {
            return back()->with('success', 'Item berhasil dihapus');
        } else {
            return back()->with('error', 'Item gagal dihapus');
        }
    }
    private function setFieldSchedules(Request $request)
    {
        $bookingdetail = [];
        foreach ($request->bookingdetail as  $bookingdetails) {
            $bookingdetail[] = [
                'jasa_id' => $bookingdetails['jasa_id'],
                'booking_id' => $bookingdetails['booking_id'],
                'start_date' => Carbon::createFromFormat('Y-m-d\TH:i', $schedule['start_date'])->format('Y-m-d H:i:s'),
                'end_date' => Carbon::createFromFormat('Y-m-d\TH:i', $schedule['end_date'])->format('Y-m-d H:i:s'),
                'harga' => $bookingdetails['harga'],
                'subtotal' => $bookingdetails['subtotal'],
            ];
        }
        return $schedules;
    }
}
