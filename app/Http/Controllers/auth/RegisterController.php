<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserAccount;
use App\Models\UserType;
use App\Models\SeekerProfiles;
use App\Models\Company;
use App\Models\Company_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function chooseUserType(){
        return view('auth.user_type');
    }

    public function jobSeekerRegistration(){
        return view('auth.jobseeker-registartion-form');
    }

    public function jobSeekerRegistrationSubmit(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'avatar' => 'required|image',
            'email' => 'required|email',
            'contact_number' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        $request->merge([
            'user_type_id' => 0,
            'is_active' => 1,
            'registration_date' => now(),
        ]);

        // $imageUrl = $this->storeImage($request);
        $data = $request->all();
        // $data['avatar'] = $imageUrl;

        dd($data);`
        $userAccount = new UserAccount();
        $userAccount->user_type_id = $data['user_type_id'];
        $userAccount->email = $data['email'];
        $userAccount->user_image = $data['avatar'];
        $userAccount->password = Hash::make($data['password']);
        $userAccount->date_of_birth = $data['date_of_birth'];
        $userAccount->gender = $data['gender'];
        $userAccount->is_active = $data['is_active'];
        $userAccount->contact_number = $data['contact_number'];
        $userAccount->registration_date = $data['registration_date'];
        $userAccount->save();

        $jobSeeker = new SeekerProfiles();
        $jobSeeker->user_account_id = $userAccount->id;
        $jobSeeker->first_name = $request->first_name;
        $jobSeeker->last_name = $request->last_name;
        $jobSeeker->contact_email = $request->email;
        $jobSeeker->contact_phone = $request->contact_number;
        $jobSeeker->save();

        return redirect()->route('jobs.index');
    }

    public function employerRegistration(){
        return view('auth.employer-registartion-form');
    }

    public function employerRegistrationSubmit(){
        $request->validate([
            'user_type_id' => 'required',
            'company_name' => 'required',
            'company_email' => 'required|email',
            'company_website_url' => 'required',
            'profile_description' => 'required',
            'establishment_date' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        $request->merge([
            'is_active' => 1,
            'registration_date' => now(),
        ]);

        $path = $request->file('avatar')->store('public/job-seeker');

        $userAccount = new UserAccount();
        $userAccount->user_type_id = $user_type_id;
        $userAccount->email = $request->company_email;
        $userAccount->password = Hash::make($request->password);
        $userAccount->is_active = $request->is_active;
        $userAccount->registration_date = $request->registration_date;
        $userAccount->date_of_birth = $request->establishment_date;
        $userAccount->user_image = $request->company_image_url;
        $userAccount->save();

        $Company = new Company();
        $Company->id = $userAccount->id;
        $Company->company_name = $request->company_name;
        $Company->company_image_url = $request->company_image_url;
        $Company->company_email = $request->company_email;
        $Company->company_website_url = $request->company_website_url;
        $Company->profile_description = $request->profile_description;
        $Company->establishment_date = $request->establishment_date;
        $Company->save();

        $Company_image = new Company_image();
        $Company_image->company_id = $Company->id;
        $Company_image->company_image_url = $request->company_image_url;
        $Company_image->save();

        return redirect()->route('jobs.index');
    }

}
