@extends('dashboard.layout.main')

@section('content')
    <div class="relative overflow-x-auto sm:rounded-lg max-w-2xl">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add Car</h2>
        <form action="{{ route('carStore') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="cars_model" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Car Model</label>
                    <input type="text" name="cars_model" id="cars_model" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter car model" required="">
                    @if ($errors->has('cars_model'))
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $errors->first('cars_model') }}</p>
                    @endif
                </div>
                <div class="sm:col-span-2">
                    <label for="cars_brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Car Brand</label>
                    <input type="text" name="cars_brand" id="cars_brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter car brand" required="">
                    @if ($errors->has('cars_brand'))
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $errors->first('cars_brand') }}</p>
                    @endif
                </div>
                <div class="sm:col-span-2">
                    <label for="cars_nopol" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Car Number Police</label>
                    <input type="text" name="cars_nopol" id="cars_nopol" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter license plate number" required="">
                    @if ($errors->has('cars_nopol'))
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $errors->first('cars_nopol') }}</p>
                    @endif
                </div>
                <div class="sm:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="cars_image">Upload file</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="cars_image" id="cars_image" type="file" name="cars_image">
                    @if ($errors->has('cars_image'))
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $errors->first('cars_image') }}</p>
                    @endif
                </div>
                <div class="sm:col-span-2">
                    <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Car</label>
                    <select id="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Choose Category</option>
                        @foreach ($category as $id => $cate)
                            <option value="{{ $id }}">{{ $cate }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $errors->first('category_id') }}</p>
                    @endif
                </div>
                <div class="sm:col-span-2">
                    <label for="cars_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description Car</label>
                    <input id="cars_description" type="hidden" name="cars_description" value="{{ old('cars_description') }}">
                    <trix-editor data-trix-editor data-trix-content-type="text/html" input="cars_description"></trix-editor>
                    @if ($errors->has('cars_description'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $errors->first('cars_description') }}</p>
                    @endif
                </div>
                <div class="sm:col-span-2">
                    <label for="cars_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cars Price /day</label>
                    <input type="number" name="cars_price" id="cars_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter Price" required="">
                    @if ($errors->has('cars_price'))
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $errors->first('cars_price') }}</p>
                    @endif
                </div>
            </div>
            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Tambahkan Novel
            </button>
        </form>
    </div>
@endsection
