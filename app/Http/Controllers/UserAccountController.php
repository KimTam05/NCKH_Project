<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAccount;
use App\Models\SeekerProfiles;

class UserAccountController extends Controller
{
    public function show($user_id)
    {
        $user_data = UserAccount::where('id', $user_id)->first();
        $user_data_type = $user_data->user_type_id;
        if ($user_data_type == 1) {
            $user_data->user_type = 'Job Seeker';
            $user_profile = SeekerProfiles::where('user_account_id', $user_id)->first();
        } else {
            $user_data->user_type = 'Employer';
        }
        return view('profile.show', compact('user_data', 'user_profile'));
    }

    public function edit($user_id)
    {
        $user_data = UserAccount::where('id', $user_id)->first();
        return view('profile.edit');
    }

    public function update($user_id, Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'contact_number' => 'required',
            'experience' => 'required|numeric',
        ]);

        $user = UserAccount::where('id', $user_id)->first();
        $user->fill($request->all());
        $user->save();

        return redirect()->route('profile.show', $user_id);
    }
}
