<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAccount;
use App\Models\SeekerProfiles;
use Carbon\Carbon;

class UserAccountController extends Controller
{
    public function show($profile_url)
    {
        $user_data = UserAccount::where('profile_url', $profile_url)->first();
        $user_data_type = $user_data->user_type_id;
        $userID = $user_data->id;
        if ($user_data_type == 1) {
            $user_data->user_type = 'Job Seeker';
            $user_profile = SeekerProfiles::where('user_account_id', $userID)->first();
            $date = $user_data->date_of_birth;
            $formattedDate = Carbon::parse($date)->format('d/m/Y');
            $user_data->date_of_birth = $formattedDate;
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

}
