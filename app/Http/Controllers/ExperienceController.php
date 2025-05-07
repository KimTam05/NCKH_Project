<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExperienceDetail;

class ExperienceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'job_name' => 'required|string|max:50',
            'company_name' => 'required|string|max:50',
            'start_date' => 'required|date',
        ]);

        ExperienceDetail::create([
            'user_account_id' => auth()->id(),
            'job_name' => $request->job_name,
            'company_name' => $request->company_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
            'current_job' => $request->has('current_job'),
        ]);

        return redirect()->route('profile')->with('success', 'Kinh Nghiệm Làm Việc Đã Được Lưu');
    }
}