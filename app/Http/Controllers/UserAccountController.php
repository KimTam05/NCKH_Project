<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
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
            return view('profile.job-seeker.show', compact('user_data', 'user_profile'));
        } else {
            $user_data->user_type = 'Employer';
        }
        
    }

    public function edit($profile_url)
    {
        $user_data = UserAccount::where('profile_url', $profile_url)->first();
        if(Session::get('user_type_id') == 1){
            $user_profile = SeekerProfiles::where('user_account_id', $user_data->id)->first();
            return view('profile.job_seeker.edit', compact('user_data'), compact('user_profile'));
        }
        else if(Session::get('user_type_id') == 2){
            return view('profile.employer_edit', compact('user_data'), compact('user_profile'));
        }
    }

    public function updateJobSeeker(Request $request, $profile_url){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact_number' =>'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'user_image' => 'image|mimes: jpg, jpeg, png|max:2048',
        ]);
        $userAccount = UserAccount::where('profile_url', $profile_url)->first();
        $data = $request->all();
        $folder = 'uploads/job_seekers';
        $imagePath = $userAccount->user_image;
        if($request->hasFile('user_image')){
            $image = $request->file('user_image');
            $path = public_path($folder);
            $imageName = time().'_'.$data('name').'.'.$image->getClientOriginalExtension();
            $image->move($image, $imageName);
            $imagePath = $folder.'/'.$imageName;
        }
        
        $userAccount->user_type_id = 1;
        $userAccount->email = $data['email'];
        $userAccount->date_of_birth = $data['date_of_birth'];
        $userAccount->gender = $data['gender'];
        $userAccount->contact_number = $data['contact_number'];
        $userAccount->user_image = $imagePath;
        $userAccount->profile_url = $profile_url;
        $userAccount->save();

        $jobSeekerUpdate = SeekerProfiles::where('user_account_id', $userAccount->id)->first();
        $jobSeekerUpdate->name = $data['name'];
        $jobSeekerUpdate->contact_email = $data['email'];
        $jobSeekerUpdate->contact_phone = $data['contact_number'];
        $jobSeekerUpdate->save();

        return redirect()->route('profile.job-seeker.show', compact('profile_url'))->with('success', 'Sửa đổi thành công!');
    }

}
