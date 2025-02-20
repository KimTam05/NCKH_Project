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

        if ($user_account) {
            if ($user_account->is_active != 1) {
                return back()->withErrors(['account' => 'Tài khoản đang bị khoá!']);
            }
            else{
                if(Hash::check($data['password'], $user_account->password)) {
                    Session::put('user_email', $user_account->email);
                    Session::put('user_id', $user_account->id);
                    return redirect()->route('jobs.index');
                }
            }
        }

        return back()->withErrors(['account' => 'Tài khoản hoặc mật khẩu sai!']);
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
