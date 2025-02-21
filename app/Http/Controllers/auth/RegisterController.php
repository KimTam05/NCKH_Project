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
use Illuminate\Support\Str;

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
            'user_image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'email' => 'required|email',
            'contact_number' => 'required',
            'password' => [
                'required',
                'string',
                'min:8',
            ],
            'password_confirmation' => 'required|same:password',
        ]);
        $request->merge([
            'user_type_id' => 1,
            'is_active' => 1,
            'registration_date' => now(),
        ]);
        $folder = 'uploads/job_seekers';
        $data = $request->all();

        if($request->hasFile('user_image')){
            $image = $request->file('user_image');
            $path = public_path($folder);
            $imageName = time().'_'.$data['first_name'].$data['last_name'].'.'.$image->getClientOriginalExtension();
            $image->move($path, $imageName);
            $imagePath = $folder . '/' .$imageName;
        }

        do{
            $profile_url = Str::random(40);
        } while(UserAccount::where('profile_url', $profile_url)->exists());

        $userAccount = new UserAccount();
        $userAccount->user_type_id = $data['user_type_id'];
        $userAccount->email = $data['email'];
        $userAccount->user_image = $imagePath;
        $userAccount->password = Hash::make($data['password']);
        $userAccount->date_of_birth = $data['date_of_birth'];
        $userAccount->gender = $data['gender'];
        $userAccount->is_active = $data['is_active'];
        $userAccount->contact_number = $data['contact_number'];
        $userAccount->registration_date = $data['registration_date'];
        $userAccount->profile_url = $profile_url;
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

    public function employerRegistrationSubmit(Request $request){
        $request->validate([
            'company_name' => 'required',
            'company_email' => 'required|email',
            'company_website_url' => 'required',
            'establishment_date' => 'required',
            'company_image_url' => 'image|mimes:jpeg,jpg,png|max:2048',
            'contact_number' => 'required',
            'password' => [
                'required',
                'string',
                'min:8',
            ],
            'password_confirmation' => 'required|same:password',
        ]);
        $request->merge([
            'user_type_id' => 2,
            'is_active' => 1,
            'registration_date' => now(),
        ]);

        $data = $request->all();
        $folder = 'uploads/employers';

        if($request->hasFile('company_image_url')){
            $image = $request->file('company_image_url');
            $path = public_path($folder);
            $imageName = time().'_'.$data['company_name'].'.'.$image->getClientOriginalExtension();
            $image->move($path, $imageName);
            $imagePath = $folder . '/' .$imageName;
        }

        do{
            $profile_url = Str::random(40);
        } while(UserAccount::where('profile_url', $profile_url)->exists());

        $userAccount = new UserAccount();
        $userAccount->user_type_id = $data['user_type_id'];
        $userAccount->email = $data['company_email'];
        $userAccount->gender = 2;
        $userAccount->password = Hash::make($data['password']);
        $userAccount->is_active = $data['is_active'];
        $userAccount->contact_number = $data['contact_number'];
        $userAccount->registration_date = $data['registration_date'];
        $userAccount->date_of_birth = $data['establishment_date'];
        $userAccount->user_image = $imagePath;
        $userAccount->profile_url = $profile_url;
        $userAccount->save();

        $Company = new Company();
        $Company->id = $userAccount->id;
        $Company->company_name = $data['company_name'];
        $Company->company_email = $data['company_email'];
        $Company->company_website_url = $data['company_website_url'];
        $Company->profile_description = " ";
        $Company->establishment_date = $data['establishment_date'];
        $Company->save();

        $Company_id = Company::where('company_email', $data['company_email'])->first();

        Company_image::create([
            'company_id' => $Company_id->id,
            'company_image_url' => $imagePath,
        ]);

        return redirect()->route('jobs.index');
    }

}
