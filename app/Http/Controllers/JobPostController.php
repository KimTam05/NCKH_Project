<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use App\Models\UserAccount;
use App\Models\Company;

class JobPostController extends Controller
{
    public function dashbaord($profile_url)
    {
        // Logic for the dashboard
        $user = UserAccount::where('profile_url', $profile_url)->first();
        if (!$user) {
            return redirect()->route('jobs.index')->with('error', 'User not found');
        }
        $company = Company::where('id', $user->id)->first();
        if (!$company) {
            return redirect()->route('jobs.index')->with('error', 'Company not found');
        }
        $job = JobPost::where('post_by_id', $company->id)->get();
        if ($job->isEmpty()) {
            return redirect()->route('jobs.index')->with('error', 'No job posts found');
        }
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
}