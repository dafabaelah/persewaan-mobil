<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class CarsController extends Controller
{
    public function carIndex()
    {
        $cars = Cars::all();
        // dd($cars->toArray());
        $title = 'Delete Cars';
        $text = 'Cars has been deleted';
        confirmDelete($title, $text);
        return view('dashboard.cars.index', compact('cars'));
    }

    public function carCreate()
    {
        $category = Category::pluck('category_name', 'id');

        return view('dashboard.cars.create', compact('category'));
    }

    public function carEdit(Request $request, $id)
    {   
        $car = Cars::findOrFail($id); // Mengambil data car berdasarkan id
        // dd($car->toArray());
        $category = Category::pluck('category_name', 'id');
        return view('dashboard.cars.edit', compact('car', 'category'));
    }

    public function carStore(Request $request)
    {
        // dd($request->toArray());
        $request->validate([
            'cars_model' => 'required|max:255',
            'cars_brand' => 'required|max:255',
            'cars_nopol' => 'required|regex:/^[A-Za-z]{1,2} \d{1,4} [A-Za-z]{1,3}$/',
            'cars_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'cars_description' => 'required',
            'cars_price' => 'required|integer|min:1',
        ]);
        try {
            $userId = Auth::id();
            // Validate the request
    
            $fileName = null;
    
            if ($request->hasFile('cars_image')) {
                $file = $request->file('cars_image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads', $fileName, 'public'); // Simpan file di storage/app/public/uploads
            }
    

            $car = Cars::create([
                'cars_model' => $request->cars_model,
                'cars_brand' => $request->cars_brand,
                'cars_nopol' => $request->cars_nopol,
                'cars_image' => $fileName,
                'category_id' => $request->category_id,
                'cars_description' => $request->cars_description,
                'cars_price' => $request->cars_price,
            ]);

            Alert::suceess('Success', 'Car has been added');
    
            return redirect()->route('carsAdmin');
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function updateCar(Request $request, $id)
    {
        
        $request->validate([
            'cars_model' => 'required|max:255',
            'cars_brand' => 'required|max:255',
            'cars_nopol' => 'required|regex:/^[A-Za-z]{1,2} \d{1,4} [A-Za-z]{1,3}$/',
            'cars_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'cars_description' => 'required',
            'cars_price' => 'required|integer|min:1',
        ]);
        try {
            $cars = Cars::findOrFail($id);
            $userId = Auth::id();
            // Hanya update password jika diisi
            if ($request->filled('password')) {
                $dataToUpdate['password'] = Hash::make($request->password);
            }
    
            $fileName = null;
    
            if ($request->hasFile('gambar_novel')) {
                $file = $request->file('gambar_novel');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads', $fileName, 'public'); // Simpan file di storage/app/public/uploads
            }

            $dataToUpdate = [
                'cars_model' => $request->cars_model,
                'cars_brand' => $request->cars_brand,
                'cars_nopol' => $request->cars_nopol,
                'cars_image' => $fileName,
                'category_id' => $request->category_id,
                'cars_description' => $request->cars_description,
                'cars_price' => $request->cars_price,
            ];

            $cars->update($dataToUpdate);

            Alert::success('Success', 'Car has been edited');
            // Redirect or perform other actions
            return redirect()->route('carsAdmin')->with('success', 'Post created successfully');
            //code...
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function deleteCar(Request $request, $id)
    {
        $car = Cars::findOrFail($id);
        $car->is_deleted = true;
        $car->save();
        $car->delete();
        Alert::success('Success', 'Car has been deleted');
        return redirect()->route('carsAdmin');
    }
}
