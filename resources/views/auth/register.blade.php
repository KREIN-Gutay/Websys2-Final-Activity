@extends('layout')

@section('content')
<div class="card shadow p-4">
    <h2 class="mb-4 text-center">Student Registration</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Student ID</label>
                <input type="text" name="student_id" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label>Middle Name</label>
                <input type="text" name="middle_name" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label>Gender</label>
                <select name="gender" class="form-control">
                    <option value="">Select</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label>Birthdate</label>
                <input type="date" name="birthdate" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label>Contact Number</label>
                <input type="text" name="contact_number" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Course</label>
                <input type="text" name="course" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Year Level</label>
                <input type="text" name="year_level" class="form-control">
            </div>

            <div class="col-md-12 mb-3">
                <label>Address</label>
                <textarea name="address" class="form-control"></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">Register</button>
        <p class="mt-3 text-center">Already have an account? <a href="{{ route('login.form') }}">Login</a></p>
    </form>
</div>
@endsection