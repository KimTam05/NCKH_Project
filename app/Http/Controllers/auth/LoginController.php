<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserAccount;
use Session;
use Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        $data = $request->only('email', 'password');

        $user_account = UserAccount::where('email', $request->email)->first();

        if (!$user_account || !Hash::check($data['password'], $user_account->password)) {
            return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không đúng!');
        }
        elseif ($user_account->is_active != 1) {
            return back()->with(['error' => 'Tài khoản đang bị khoá!']);
        }
        else{
            $request->session()->put([
                'user_email' => $user_account->email,
                'profile_url' => $user_account->profile_url,
                'user_type_id' => $user_account->user_type_id,
            ]);
            // Security Session
            $request->session()->regenerate();

            return redirect()->route('jobs.index');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}

