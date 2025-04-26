<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EducationDetail;

class EducationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'degree_name' => 'required|string|max:50',
            'major' => 'required|string|max:50',
            'institute_name' => 'required|string|max:50',
            'starting_date' => 'required|date',
        ]);

        EducationDetail::create([
            'user_account_id' => auth()->id(),
            'certificate_degree_name' => $request->degree_name,
            'major' => $request->major,
            'insitute_university_name' => $request->institute_name,
            'starting_date' => $request->starting_date,
            'completion_date' => $request->completion_date,
            'honors_awards' => $request->honors_awards,
        ]);

        return redirect()->route('profile')->with('success', 'Bằng Cấp Đã Được Lưu');
    }
}