<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAccount;
use App\Models\SeekerProfiles;
use App\Models\Experience;
use Carbon\Carbon;
use App\Models\Education;


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
            $exp = Experience::where('user_account_id', $userID)->get();
            $education = Education::where('user_account_id', $userID)->get();
            $date = $user_data->date_of_birth;
            $formattedDate = Carbon::parse($date)->format('d/m/Y');
            $user_data->date_of_birth = $formattedDate;
            return view('profile.job-seeker.show', compact('user_data', 'user_profile', 'exp', 'education'));
        } else {
            $user_data->user_type = 'Employer';
        }
        
    }

    public function edit($profile_url)
    {
        $user_data = UserAccount::where('profile_url', $profile_url)->first();
        if(Session::get('user_type_id') == 1){
            $user_profile = SeekerProfiles::where('user_account_id', $user_data->id)->first();
            return view('profile.job-seeker.edit', compact('user_data'), compact('user_profile'));
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

    public function experienceForm($profile_url) {
        return view('profile.job-seeker.experience-form', compact('profile_url'));
    }

    public function experienceSubmit($profile_url, Request $request){
        $user_data = UserAccount::where('profile_url', $profile_url)->first();
        if (!$user_data) {
            return redirect()->back()->with('error', 'User not found.');
        }
        $userID = $user_data->id;
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'is_current_job' => 'required|in:1,0',
            'job_name' => 'required',
            'company_name' => 'required',
            'job_location_city' => 'required',
            'job_location_state' => 'required',
            'job_location_country' => 'required',
            'description' => 'nullable',
        ]);
        
        $data = $request->except('_token');
        $data['user_account_id'] = $userID;
        
        $exp = new Experience();
        $exp['user_account_id'] = $userID;
        $exp['start_date'] = $data['start_date'];
        $exp['end_date'] = $data['end_date'];
        $exp['job_name'] = $data['job_name'];
        $exp['company_name'] = $data['company_name'];
        $exp['is_current_job'] = $data['is_current_job'];
        $exp['job_location_city'] = $data['job_location_city'];
        $exp['job_location_state'] = $data['job_location_state'];
        $exp['job_location_country'] = $data['job_location_country'];
        $exp['description'] = $data['description'];
        $exp->save();
        return redirect()->route('profile.show', compact('profile_url'))->with('success', 'Sửa đổi thành công!');
    }

    public function educationForm($profile_url) {
        return view('profile.job-seeker.education-form', compact('profile_url'));
    }

    public function educationSubmit($profile_url, Request $request){
        $user_data = UserAccount::where('profile_url', $profile_url)->first();
        if(!$user_data) {
            return redirect()->back()->with('error', 'User not found.');
        }
        $userID = $user_data->id;
        $request->validate([
            'certificate_degree_name' => 'required',
            'major' => 'required',
            'insitute_university_name' => 'required',
            'starting_date' => 'required|date',
            'completion_date' => 'required|date|after_or_equal:start_date',
            'percentage' => 'required',
            'cgpa' => 'required',
        ]);
        $data = $request->except('_token');
        $data['user_account_id'] = $userID;
        $education = new Education();
        $education['user_account_id'] = $userID;
        $education['certificate_degree_name'] = $data['certificate_degree_name'];
        $education['major'] = $data['major'];
        $education['insitute_university_name'] = $data['insitute_university_name'];
        $education['starting_date'] = $data['starting_date'];
        $education['completion_date'] = $data['completion_date'];
        $education['percentage'] = $data['percentage'];
        $education['cgpa'] = $data['cgpa'];
        $education->save();
        return redirect()->route('profile.show', compact('profile_url'))->with('success', 'Sửa đổi thành công!');
    }

}
