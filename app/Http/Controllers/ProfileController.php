<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function dashboard()
    {
        if (!session()->has('student_id')) {
            return redirect('/login')->with('error', 'Please login first.');
        }

        $student = DB::table('students')->where('id', session('student_id'))->first();

        return view('dashboard', compact('student'));
    }

    public function edit()
    {
        if (!session()->has('student_id')) {
            return redirect('/login')->with('error', 'Please login first.');
        }

        $student = DB::table('students')->where('id', session('student_id'))->first();

        return view('profile.edit', compact('student'));
    }

    public function update(Request $request)
    {
        if (!session()->has('student_id')) {
            return redirect('/login')->with('error', 'Please login first.');
        }

        $request->validate([
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'gender' => 'required',
            'birthdate' => 'required|date',
            'contact_number' => 'required',
            'address' => 'required',
            'course' => 'required',
            'year_level' => 'required',
        ]);

        DB::table('students')
            ->where('id', session('student_id'))
            ->update([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'gender' => $request->gender,
                'birthdate' => $request->birthdate,
                'contact_number' => $request->contact_number,
                'address' => $request->address,
                'course' => $request->course,
                'year_level' => $request->year_level,
                'updated_at' => now(),
            ]);

        DB::table('system_logs')->insert([
            'student_id' => session('student_id'),
            'event' => 'UPDATE_PROFILE',
            'description' => 'Student updated profile information',
            'ip_address' => $request->ip(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/dashboard')->with('success', 'Profile updated successfully.');
    }
}