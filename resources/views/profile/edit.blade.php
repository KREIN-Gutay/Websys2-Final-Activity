@extends('layout')

@section('content')
<div class="card shadow p-4">
    <h2 class="mb-4">Edit Profile</h2>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf

        <div class="row">
            <div class="col-md-4 mb-3">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control" value="{{ $student->first_name }}">
            </div>

            <div class="col-md-4 mb-3">
                <label>Middle Name</label>
                <input type="text" name="middle_name" class="form-control" value="{{ $student->middle_name }}">
            </div>

            <div class="col-md-4 mb-3">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control" value="{{ $student->last_name }}">
            </div>

            <div class="col-md-4 mb-3">
                <label>Gender</label>
                <input type="text" name="gender" class="form-control" value="{{ $student->gender }}">
            </div>

            <div class="col-md-4 mb-3">
                <label>Birthdate</label>
                <input type="date" name="birthdate" class="form-control" value="{{ $student->birthdate }}">
            </div>

            <div class="col-md-4 mb-3">
                <label>Contact Number</label>
                <input type="text" name="contact_number" class="form-control" value="{{ $student->contact_number }}">
            </div>

            <div class="col-md-6 mb-3">
                <label>Course</label>
                <input type="text" name="course" class="form-control" value="{{ $student->course }}">
            </div>

            <div class="col-md-6 mb-3">
                <label>Year Level</label>
                <input type="text" name="year_level" class="form-control" value="{{ $student->year_level }}">
            </div>

            <div class="col-md-12 mb-3">
                <label>Address</label>
                <textarea name="address" class="form-control">{{ $student->address }}</textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Update Profile</button>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection