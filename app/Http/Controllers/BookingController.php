<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    function bookingIndex() {

        $cars = Cars::all();
        // dd($cars->toArray());

        return view('booking.index', compact('cars'));
    }

    function order($id) {
        $cars = Cars::find($id);
        if (!$cars) {
            // Handle jika mobil tidak ditemukan
            abort(404);
        }
    
        return view('booking.order', compact('cars'));
    }

    // public function orderCar(Request $request)
    // {
    //     dd($request->toArray());
    //     // Validasi input
    //     $request->validate([
    //         'car_id' => 'required|exists:cars,id',
    //         'order_starts' => 'required|date',
    //         'order_ends' => 'required|date|after:order_starts',
    //     ]);

    //     try {
    //         // Hitung durasi pemesanan dalam hari
    //         $order_starts = new \DateTime($request->order_starts);
    //         $order_ends = new \DateTime($request->order_ends);
    //         $order_duration = $order_starts->diff($order_ends)->days;
    //         $order_total_qty = '1';
    //         dd($order_duration, $order_total_qty, $request->car_id, $request->order_starts, $request->order_ends, $request->order_total_qty);

    //         // Hitung total harga
    //         $car = Cars::findOrFail($request->car_id);
    //         $order_total_price = $car->cars_price * $order_duration * $request->$order_total_qty;

    //         // Simpan pesanan
    //         $order = new Order();
    //         $order->car_id = $request->car_id;
    //         $order->user_id = auth()->user()->id; // Sesuaikan dengan sistem autentikasi Anda
    //         $order->order_starts = $order_starts;
    //         $order->order_ends = $order_ends;
    //         $order->order_total_price = $order_total_price;
    //         $order->order_total_qty = $order_total_qty;
    //         $order->order_status = 'disewa'; // Sesuaikan dengan status default yang Anda inginkan
    //         $order->order_duration = $order_duration;
    //         $order->save();

    //         return redirect()->route('order')->with('success', 'Order berhasil dibuat.');
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }

        
    // }

    public function orderCar(Request $request)
    {
        // Debug request data
        // dd($request->toArray());

        // Validasi input
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'order_starts' => 'required|date_format:m/d/Y',
            'order_ends' => 'required|date_format:m/d/Y|after:order_starts',
        ]);

        try {
            $order_starts = Carbon::createFromFormat('m/d/Y', $request->order_starts);
            $order_ends = Carbon::createFromFormat('m/d/Y', $request->order_ends);
            $order_duration = $order_starts->diffInDays($order_ends);
            $order_total_qty = 1;

            $car = Cars::findOrFail($request->car_id);
            $order_total_price = $car->cars_price * $order_duration * $order_total_qty;

            $order = new Order();
            $order->car_id = $request->car_id;
            $order->user_id = auth()->user()->id;
            $order->order_starts = $order_starts;
            $order->order_ends = $order_ends;
            $order->order_total_price = $order_total_price;
            $order->order_total_qty = $order_total_qty;
            $order->order_status = 'disewa';
            $order->order_duration = $order_duration;
            $order->save();

            return redirect()->route('booking')->with('success', 'Order berhasil dibuat.');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
