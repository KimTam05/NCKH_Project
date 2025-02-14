<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserAccount;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function chooseUserType(){
        return view('auth.user_type');
    }
    public function submitUserType(Request $request){
        $request->validate([
            'user_type_id' => 'required'
        ]);
        return redirect()->route('register', ['user_type_id' => $request->user_type_id]);
    }
    public function showRegistrationForm($user_type_id)
    {
        $user_type_id = UserType::findOrFail($user_type_id);
        return view('auth.register', compact('user_type_id'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'user_type_id' => 'required',
            'email' => 'required|email|unique:user_account',
            'password' => 'required|confirmed|min:6',
            'date_of_birth' => 'required|date',
            'gender' => 'required|boolean',
            'contact_number' => 'required|string|max:12',
            'user_image' => 'required|image|max:2048'
        ]);

        $user = new UserAccount();
        $user->user_type_id = $request->user_type_id;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->is_active = 1;
        $user->contact_number = $request->contact_number;
        $user->user_image = $request->file('user_image')->store('user_images', 'public');
        $user->registration_date = now();
        $user->save();

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }
}
