<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = JobPost::all();
        $user_type = session('user_type_id');
        return view('jobs.index', compact('jobs', 'user_type'));
    }

    public function create()
    {
        $user_type = session('user_type_id');
        if ($user_type != 2) {
            return redirect()->route('jobs.index')->with('error', 'Bạn không có quyền đăng tin tuyển dụng.');
        }
        return view('jobs.create', compact('user_type'));
    }

    public function store(Request $request)
    {
        $user_type = session('user_type_id');
        if ($user_type != 2) {
            return redirect()->route('jobs.index')->with('error', 'Bạn không có quyền đăng tin tuyển dụng.');
        }

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

        return redirect()->route('jobs.index')->with('success', 'Đăng tin tuyển dụng thành công!');
    }

    public function show($id)
    {
        $job = JobPost::findOrFail($id);
        $user_type = session('user_type_id');
        return view('jobs.show', compact('job', 'user_type'));
    }
}