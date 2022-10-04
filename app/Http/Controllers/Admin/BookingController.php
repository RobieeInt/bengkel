<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;




class BookingController extends Controller
{
    public function index()
    {
        $bookings = Transaction::all();
        return view('admin.booking.index', compact('bookings'));
    }

    public function create()
    {
        return view('admin.booking.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'service_id' => 'required',
            'service_detail_id' => 'required',
            'description' => 'required',
            'payment_status' => 'required',
            'total_price' => 'required',
            // validate service_date must be 2 days from now
            'service_date' => 'required|date|after_or_equal:'.date('Y-m-d', strtotime('+2 days')),
        ]);

        // generate transaction_code
        $transaction_code = 'TRX' . mt_rand(10000, 99999) . mt_rand(100, 999);

        //service date must be 2 days from now
        $service_date = $request->service_date;
        $service_date = date('Y-m-d', strtotime($service_date . ' + 2 days'));

        Transaction::create([
            'user_id' => auth()->user()->id,
            'service_id' => $request->service_id,
            'service_detail_id' => $request->service_detail_id,
            'name' => $request->name,
            'description' => $request->description,
            'status' => 'antrian',
            'payment_status' => $request->payment_status,
            'payment_proof' => null,
            'total_price' => $request->total_price,
            'transaction_code' => $transaction_code,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'service_date' => $service_date,
        ]);

        return redirect()->route('admin.booking.index')->with('success', 'Booking created successfully');
    }

    public function show($id)
    {
        $booking = Transaction::find($id);
        return view('admin.booking.show', compact('booking'));
    }

    public function edit($id)
    {
        $booking = Transaction::find($id);
        return view('admin.booking.edit', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'package_id' => 'required',
            'status' => 'required',
        ]);

        $booking = Transaction::find($id);
        $booking->update($request->all());

        return redirect()->route('admin.booking.index')->with('success', 'Booking updated successfully');
    }

    public function destroy($id)
    {
        $booking = Transaction::find($id);
        $booking->delete();

        return redirect()->route('admin.booking.index')->with('success', 'Booking deleted successfully');
    }


}
