<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'student_id' => 'required|unique:students,student_id',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|min:6|confirmed',
            'gender' => 'required',
            'birthdate' => 'required|date',
            'contact_number' => 'required',
            'address' => 'required',
            'course' => 'required',
            'year_level' => 'required',
        ]);

        $studentId = DB::table('students')->insertGetId([
            'student_id' => $request->student_id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'course' => $request->course,
            'year_level' => $request->year_level,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('system_logs')->insert([
            'student_id' => $studentId,
            'event' => 'REGISTER',
            'description' => 'Student registered successfully',
            'ip_address' => $request->ip(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/login')->with('success', 'Registration successful. Please login.');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $student = DB::table('students')->where('email', $request->email)->first();

        if ($student && Hash::check($request->password, $student->password)) {
            session([
                'student_id' => $student->id,
                'student_name' => $student->first_name . ' ' . $student->last_name
            ]);

            DB::table('system_logs')->insert([
                'student_id' => $student->id,
                'event' => 'LOGIN',
                'description' => 'Student logged in successfully',
                'ip_address' => $request->ip(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect('/dashboard');
        }

        DB::table('system_logs')->insert([
            'student_id' => null,
            'event' => 'FAILED_LOGIN',
            'description' => 'Failed login attempt for email: ' . $request->email,
            'ip_address' => $request->ip(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('error', 'Invalid email or password.');
    }

    public function logout(Request $request)
    {
        $studentId = session('student_id');

        DB::table('system_logs')->insert([
            'student_id' => $studentId,
            'event' => 'LOGOUT',
            'description' => 'Student logged out',
            'ip_address' => $request->ip(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        session()->flush();

        return redirect('/login')->with('success', 'Logged out successfully.');
    }
}