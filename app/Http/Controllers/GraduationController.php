<?php

namespace App\Http\Controllers;

use App\Models\Graduation;
use App\Models\Setting;
use Illuminate\Http\Request;

class GraduationController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view('welcome', [
            'setting' => $setting,
            'student' => null,
        ]);
    }

    public function check(Request $request)
    {
        $request->validate([
            'nisn' => ['required'],
        ]);

        $setting = Setting::first();

        $student = Graduation::where('nisn', $request->nisn)->first();

        return view('welcome', [
            'setting' => $setting,
            'student' => $student,
        ]);
    }
}