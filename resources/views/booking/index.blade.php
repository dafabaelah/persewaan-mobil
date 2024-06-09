@extends('layout.main')

@section('content')

<section class="bg-gray-50 dark:bg-gray-900 py-8">
    <div class="container mx-auto px-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Car Booking</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Filters Section -->
            <div class="bg-white p-6 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-white">Filters</h2>
                <form action="{{ route('bookSearchCar') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="search" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Search</label>
                        <input type="search" id="search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search cars...">
                    </div>
                    <div class="mb-4">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled>Choose Category</option>
                                @foreach ($category as $id => $cate)
                                    <option value="{{ $id }}">{{ $cate }}</option>
                                @endforeach
                            </select>
                    </div>
                    {{-- <div class="mb-4">
                        <label for="cars_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price Range</label>
                        <input type="range" id="cars_price" min="0" max="1000" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                        <div class="flex justify-between text-xs text-gray-500">
                            <span>$0</span>
                            <span>$1000</span>
                        </div>
                    </div> --}}
                    <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Apply Filters</button>
                </form>
            </div>
            <!-- Car List Section -->
            <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($cars as $car)
                    <div class="bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <img class="rounded-t-lg" src="https://via.placeholder.com/640x480.png/004455?text={{ $car->cars_model }}" alt="Car Image">
                        <div class="p-6">
                            <h5 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $car->cars_model }}</h5>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Brand: {{ $car->cars_brand }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Price: @money($car->cars_price)/day</p>
                            <a href="{{ route('order', ['id' => $car->id]) }}" class="text-primary-600 hover:underline dark:text-primary-500">Book Now</a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600 dark:text-gray-400">Not cars for booking.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

@endsection