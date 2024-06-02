@extends('layout.main')

@section('content')

<section class="bg-gray-50 dark:bg-gray-900 py-8">
    <div class="container mx-auto px-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Detail Car Order</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Car List Section -->
            <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <img class="rounded-t-lg" src="https://via.placeholder.com/640x480.png/004455?text={{ $orders->cars->cars_model}}" alt="Car Image">
                    <div class="p-6">
                        <h5 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $orders->cars->cars_model}}</h5>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Brand: {{ $orders->cars->cars_brand }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Price: @money($orders->cars->cars_price)/day</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Description: {!! $orders->cars->cars_description !!}</p>
                    </div>
                </div>
            </div>
            <!-- booking Section -->
            <div class="bg-white p-6 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-white">Order</h2>
                <div class="bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 p-6 mb-4">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Total</h2>
                    <div class="flex justify-between items-center border-b border-gray-300 pb-4">
                        <span class="text-gray-600 dark:text-gray-400">Total Duration:</span>
                        <span class="text-gray-900 dark:text-white font-semibold">{{ $orders->order_duration}} day</span>
                    </div>
                    <div class="flex justify-between items-center border-b border-gray-300 pb-4">
                        <span class="text-gray-600 dark:text-gray-400">Total Amount:</span>
                        <span class="text-gray-900 dark:text-white font-semibold">@money($orders->order_total_price)</span>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>

@endsection