<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = JobPost::all();
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'job_type' => 'required',
            'salary' => 'required',
            'location' => 'required',
            'file' => 'required|file',
        ]);

        $job = new JobPost();
        $job->job_title = $request->title;
        $job->description = $request->description;
        $job->job_type_id = $request->job_type;
        $job->salary = $request->salary;
        $job->job_location_id = $request->location;
        $job->file_description = $request->file->store('files');
        $job->save();

        return redirect()->route('jobs.index');
    }

    public function show($id)
    {
        $job = JobPost::findOrFail($id);
        return view('jobs.show', compact('job'));
    }
}