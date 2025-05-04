<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use App\Models\UserAccount;
use App\Models\Company;
// Make a random string for job_url
use Illuminate\Support\Str;

class JobPostController extends Controller
{
    public function dashboard($profile_url)
    {
        // Logic for the dashboard
        $user = UserAccount::where('profile_url', $profile_url)->first();
        $company = Company::where('id', $user->id)->first();
        if (!$user || !$company) {
            return redirect()->route('jobs.index')->with('error', 'Company not found!');
        }
        // Get all job posts by the company
        $job = JobPost::where('post_by_id', $company->id)->get();
        return view('job.employer.dashboard', compact('job'));
    }
    
    public function index()
    {
        // Logic for the job listing page
        $jobs = JobPost::all();
        return view('jobs.index', compact('jobs'));
    }
    public function show($id)
    {
        // Logic for showing a single job post
        $job = JobPost::findOrFail($id);
        return view('jobs.show', compact('job'));
    }
    public function create($profile_url)
    {
        // Logic for creating a new job post
        $user = UserAccount::where('profile_url', $profile_url)->first();
        $company = Company::where('id', $user->id)->first();
        if (!$user || !$company) {
            return redirect()->route('jobs.index')->with('error', 'Company not found!');
        }
        return view('job.employer.create', compact('user'));
    }
    public function store(Request $request, $profile_url)
    {
        // Logic for storing a new job post
        $request->validate([
            'job_title' => 'required',
            'job_description' => 'required',
            'job_location' => 'required',
            'salary' => 'required|numeric',
            'job_type' => 'required',
        ]);

        $user = UserAccount::where('profile_url', $profile_url)->first();
        $company = Company::where('id', $user->id)->first();
        if (!$user || !$company) {
            return redirect()->route('jobs.index')->with('error', 'Company not found!');
        }
        // Generate a unique job URL
        $job_url = Str::random(40);
        while (JobPost::where('job_url', $job_url)->exists()) {
            $job_url = Str::random(40);
        }

        $jobPost = new JobPost();
        $jobPost->post_by_id = $company->id;
        $jobPost->title = $request->job_title;
        $jobPost->description = $request->job_description;
        $jobPost->location = $request->job_location;
        $jobPost->salary = $request->salary;
        $jobPost->type = $request->job_type;
        $jobPost->save();

        return redirect()->route('employer.dashboard', ['profile_url' => $profile_url])->with('success', 'Job post created successfully');
    }
    public function edit($profile_url, $job_id)
    {
        // Logic for editing a job post
        $user = UserAccount::where('profile_url', $profile_url)->first();
        if (!$user) {
            return redirect()->route('jobs.index')->with('error', 'User not found');
        }
        $job = JobPost::findOrFail($job_id);
        return view('job.employer.edit', compact('user', 'job'));
    }
    public function update(Request $request, $profile_url, $job_url)
    {
        // Logic for updating a job post
        $request->validate([
            'job_title' => 'required',
            'job_description' => 'required',
            'job_location' => 'required',
            'salary' => 'required|numeric',
            'job_type' => 'required',
        ]);

        $user = UserAccount::where('profile_url', $profile_url)->first();
        $company = Company::where('id', $user->id)->first();
        if (!$user || !$company) {
            return redirect()->route('jobs.index')->with('error', 'User not found');
        }
        // Find the job post by job_url
        $jobPost = JobPost::where('job_url', $job_url)->first();
        if (!$jobPost) {
            return redirect()->route('jobs.index')->with('error', 'Job post not found');
        }
        $jobPost->title = $request->job_title;
        $jobPost->description = $request->job_description;
        $jobPost->location = $request->job_location;
        $jobPost->salary = $request->salary;
        $jobPost->type = $request->job_type;
        $jobPost->save();

        return redirect()->route('employer.dashboard', ['profile_url' => $profile_url])->with('success', 'Job post updated successfully');
    }
    public function destroy($profile_url, $job_url)
    {
        // Logic for deleting a job post
        $user = UserAccount::where('profile_url', $profile_url)->first();
        $company = Company::where('id', $user->id)->first();
        if (!$user || !$company) {
            return redirect()->route('jobs.index')->with('error', 'Company not found');
        }
        
        // Find the job post by job_url

        $jobPost = JobPost::where('job_url', $job_url)->first();
        if (!$jobPost) {
            return redirect()->route('jobs.index')->with('error', 'Job post not found');
        }
        $jobPost->delete();

        return redirect()->route('employer.dashboard', ['profile_url' => $profile_url])->with('success', 'Job post deleted successfully');
    }
}