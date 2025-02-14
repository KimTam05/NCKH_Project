<?php

namespace App\Http\Controllers;

use App\Models\UserAccount;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = UserAccount::all();
        return view('candidates.index', compact('candidates'));
    }

    public function show($id)
    {
        $candidate = UserAccount::findOrFail($id);
        return view('candidates.show', compact('candidate'));
    }
}