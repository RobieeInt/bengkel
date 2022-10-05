<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Service;
use App\Models\ServiceDetail;
//validator
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Transaction::all();
        return view('admin.booking.index', compact('bookings'));
    }

    public function create()
    {
        // services with service_detail
        $services = Service::with('service_detail')->get();
        $service_details = Service::with('service_detail')->get();
        return view('admin.booking.create', compact('services', 'service_details'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'service_id' => 'required',
        //     'service_detail_id' => 'required',
        //     'description' => 'required',
        //     'payment_status' => 'required',
        //     'total_price' => 'required',
        //     // validate service_date must be 2 days from now
        //     'service_date' => 'required|date|after_or_equal:'.date('Y-m-d', strtotime('+2 days')),
        // ]);

        $input = $request->all();

        $rules = [
            'name' => 'required',
            'service_id' => 'required',
            'service_detail_id' => 'required',
            'description' => 'required',
            'payment_status' => 'required',
            'total_price' => 'required',
            // validate service_date must be 2 days from now
            'service_date' => 'required|date|after_or_equal:'.date('Y-m-d', strtotime('+2 days')),
        ];

        $messages = [
            'name.required' => 'isi nama',
            'service_id.required' => 'isi service',
            'service_detail_id.required' => 'isi detail service',
            'description.required' => 'isi description',
            'payment_status.required' => 'isi payment status',
            'total_price.required' => 'isi total tagihan',
            'service_date.required' => 'isi tanggal serice, minimal 2 hari dari hari ini',
            'service_date.after_or_equal' => 'tanggal service minimal 2 hari dari hari ini',
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($input);
        }


        // generate transaction_code
        $transaction_code = 'TRX-' . mt_rand(10000, 99999) . mt_rand(100, 999);

        //service date must be 2 days from now
        $service_date = $request->service_date;
        $service_date = date('Y-m-d', strtotime($service_date . ' + 2 days'));

        Transaction::create([
            'user_id' => auth()->user()->id,
            // 'user_id' => 1,
            'service_id' => $request->service_id,
            'service_detail_id' => $request->service_detail_id,
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'payment_status' => $request->payment_status,
            'payment_proof' => null,
            'total_price' => $request->total_price,
            'transaction_code' => $transaction_code,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'service_date' => $service_date,
            // service date and time
            'service_date' => $request->service_date,
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

        // cannot edit if status = proses
        $booking = Transaction::find($id);
        $services = Service::with('service_detail')->get();

        if($booking->status == 'proses'){
            return redirect()->route('admin.booking.index')->with('success', 'Data tidak bisa diedit karena dalam proses pengerjaan');
        } else {
            return view('admin.booking.edit', compact('booking', 'services'));
        }

        // return view('admin.booking.edit', compact('booking', 'services'));
    }

    public function update(Request $request, $id)
    {


        $booking = Transaction::find($id);
        $booking->update($request->all());

        return redirect()->route('admin.booking.index')->with('success', 'Booking updated successfully');
    }

    public function destroy($id)
    {
        $booking = Transaction::find($id);

        // cannot delete if status = proses
        if($booking->status == 'proses' || $booking->status == 'selesai'){
            return redirect()->route('admin.booking.index')->with('fail', 'Data tidak bisa dihapus karena dalam proses pengerjaan atau sudah selesai');
        } else {
            $booking->delete();
            return redirect()->route('admin.booking.index')->with('success', 'Booking deleted successfully');
        }
    }

    //public function get service detail
    public function getServiceDetail(Request $request)
    {
        $service_id = $request->service_id;
        $service_details = ServiceDetail::where('service_id', $service_id)->get();
        return response()->json($service_details);
    }

    //change status to selesai
    public function changeStatus(Request $request, $id)
    {
        $booking = Transaction::find($id);
        $booking->status = 'selesai';
        $booking->save();

        return redirect()->route('admin.booking.index')->with('success', 'Status berhasil diubah');
    }


}
