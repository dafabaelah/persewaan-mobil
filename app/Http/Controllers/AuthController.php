<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
            'telephone' => 'required',
            'license' => 'required',
            'address' => 'required',
            
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email, 
            'password' => Hash::make($request->password),
            'telephone' => $request->telephone,
            'license' => $request->license,
            'address' => $request->address,
        ]);

        Auth::login($user);

        Alert::success('Success', 'Register success');

        return redirect()->route('welcome');
    }

    public function authenticate(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:8',
        ]);

        try {
            if (Auth::attempt($request->only('email', 'password'))) {
                $user = Auth::user();
                
                switch ($user->role) {
                    case 'admin':
                        Alert::success('Success', 'Login success');
                        return redirect()->route('dashboard');
                        break;
                    case 'user':
                        Alert::success('Success', 'Login success');
                        return redirect()->route('booking');
                        break;
                    default:
                        return redirect()->route('welcome');
                        break;
                }
                
                Alert::success('Success', 'Login success');

                return redirect()->route('welcome');
            }
            
            Alert::error('Error', 'Invalid login details');

            return back();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }

    public function logoutUser(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('welcome');
    }
}
