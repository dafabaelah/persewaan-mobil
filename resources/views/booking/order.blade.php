@extends('layout.main')

@section('content')

<section class="bg-gray-50 dark:bg-gray-900 py-8">
    <div class="container mx-auto px-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Car Order</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Car List Section -->
            <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <img class="rounded-t-lg" src="https://via.placeholder.com/640x480.png/004455?text={{ $cars->cars_model }}" alt="Car Image">
                    <div class="p-6">
                        <h5 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $cars->cars_model }}</h5>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Brand: {{ $cars->cars_brand }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Price: @money($cars->cars_price)/day</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Description: {!! $cars->cars_description !!}</p>
                    </div>
                </div>
            </div>
            <!-- booking Section -->
            <div class="bg-white p-6 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-white">Order</h2>
                <form action="{{ route('orderCar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="car_id" value="{{ $cars->id }}">
                    {{-- <div class="bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 p-6 mb-4">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Total</h2>
                        <div class="flex justify-between items-center border-b border-gray-300 pb-4">
                            <span class="text-gray-600 dark:text-gray-400">Total Amount:</span>
                            <span class="text-gray-900 dark:text-white font-semibold">@money(1000000)</span>
                        </div>
                    </div> --}}
                    <div date-rangepicker class="flex items-center mb-4">
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div>
                            <input name="order_starts" id="order_starts" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                            @if ($errors->has('order_starts'))
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $errors->first('order_starts') }}</p>
                            @endif
                        </div>
                        <span class="mx-4 text-gray-500">to</span>
                        <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                            <input name="order_ends" id="order_ends" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
                        </div>
                    </div>
                    <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Order</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection