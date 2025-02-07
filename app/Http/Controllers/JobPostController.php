<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;

class JobPostController extends Controller
{
    public function index()
    {
        $jobs = JobPost::all();
        return view('jobs.index', compact('jobs'));
    }

    public function show($id)
    {
        $job = JobPost::findOrFail($id);
        return view('jobs.show', compact('job'));
    }
}