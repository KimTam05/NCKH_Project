<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CVController extends Controller
{
    public function create()
    {
        return view('cv.add_cv');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'file' => 'required|mimes:pdf|max:2048', // Giới hạn file PDF không quá 2MB
        ]);

        // Lưu file CV
        $filePath = $request->file('file')->store('cvs', 'public');

        // Lưu thông tin CV vào database (giả lập)
        // $cv = CV::create([
        //     'full_name' => $request->full_name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'file_path' => $filePath,
        //     'experience' => $request->experience,
        //     'education' => $request->education,
        //     'skills' => $request->skills,
        // ]);

        return redirect()->route('cv.create')->with('success', 'CV đã được thêm thành công.');
    }
}