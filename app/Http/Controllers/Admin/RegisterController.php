<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.admin.registerpages');
    }

    protected function store(request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:admin',
            'phone' => 'required|unique:admin',
            'password' => 'required',
            'is_admin' => true,
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
    }
}
