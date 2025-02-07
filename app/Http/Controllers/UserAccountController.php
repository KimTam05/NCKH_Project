<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserAccountController extends Controller
{
    public function show()
    {
        return view('profile.show');
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'experience' => 'required|numeric',
        ]);

        $user = Auth::user();
        $user->fill($request->all());
        $user->save();

        return redirect()->route('profile.show');
    }
}