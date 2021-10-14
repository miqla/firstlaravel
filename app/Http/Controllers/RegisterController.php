<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        // return request()->all();     buat ngecek aja
        // return $request->all();
        // return $request;    sda, work

        // email:dns = nama domain nya harus benar
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);
        // dd('registrasi berhasil');

        // enkripsi password
        // $validatedData['password'] = bcrypt($validatedData['password']);     sama kek bawah 
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // utk nampilin pesan di halaman loginnya nanti, (success, pesan)nya boleh diganti 
        // $request->session()->flash('success', 'Registration successfull! Please login');

        // return redirect('/login');
        return redirect('/login')->with('success','Registration successfull! Please login');
    }
}
