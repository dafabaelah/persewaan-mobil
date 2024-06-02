<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    function bookingIndex(Request $request) {

        // $cars = Cars::all();
        
        $query = Cars::query();

        // Filter berdasarkan model mobil
        if ($request->has('model')) {
            $query->where('cars_model', 'like', '%' . $request->model . '%');
        }

        // Filter berdasarkan kategori mobil
        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        // Filter berdasarkan rentang harga
        if ($request->has('price')) {
            $query->where('cars_price', '<=', $request->price);
        }

        $cars = $query->get();

        $category = Category::pluck('category_name', 'id');

        return view('booking.index', compact('cars', 'category'));
    }

    function bookSearchCar(Request $request) {
        $query = Cars::query();

        // Filter berdasarkan model mobil
        if ($request->has('model')) {
            $query->where('cars_model', 'like', '%' . $request->model . '%');
        }

        // Filter berdasarkan kategori mobil
        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('category_name', $request->category);
            });
        }

        // Filter berdasarkan rentang harga
        if ($request->has('price')) {
            $query->where('cars_price', '<=', $request->price);
        }

        $cars = $query->get();

        $category = Category::pluck('category_name', 'id');

        return view('booking.index', compact('cars', 'category'));
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

    function bookingHistory() {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        // dd($orders);
        return view('history.index', compact('orders'));
    }

    function bookFinish() {
        return view('booking.finish');
    }

    public function returnCar(Request $request)
    {
        $request->validate([
            'cars_nopol' => 'required|regex:/^[A-Za-z]{1,2} \d{1,4} [A-Za-z]{1,3}$/',
        ]);

        // dd($request->toArray());

        try {
            $car = Cars::where('cars_nopol', $request->input('cars_nopol'))->first();

            if (!$car) {
                return redirect()->route('bookingHistory')->withErrors(['cars_nopol' => 'Car with the specified plate number not found.']);
            }

            $order = Order::where('car_id', $car->id)
                            ->where('order_status', 'disewa')
                            ->first();

            if (!$order) {
                return redirect()->route('bookingHistory')->withErrors(['cars_nopol' => 'Active order for this car not found.']);
            }

            $order->order_status = 'diperiksa';
            $order->save();

            return redirect()->route('orderDetail', ['id' => $order->id])->with('success', 'Car has been successfully returned.');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        
    }

    public function orderDetail($id)
    {
        $user = Auth::user();

        $orders = Order::where('id', $id)
                        ->where('user_id', $user->id)
                        ->first();
        // dd($orders->toArray());
        return view('history.detail', compact('orders'));
    }
}
