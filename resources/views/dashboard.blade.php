@extends('layout')

@section('content')
<div class="card shadow p-4">
    <h2>Welcome, {{ $student->first_name }} {{ $student->last_name }}</h2>
    <p class="text-muted">Student Dashboard</p>

    <hr>

    <p><strong>Student ID:</strong> {{ $student->student_id }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Course:</strong> {{ $student->course }}</p>
    <p><strong>Year Level:</strong> {{ $student->year_level }}</p>
    <p><strong>Contact:</strong> {{ $student->contact_number }}</p>
    <p><strong>Address:</strong> {{ $student->address }}</p>

    <a href="{{ route('profile.edit') }}" class="btn btn-warning">Edit Profile</a>

    <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button class="btn btn-danger">Logout</button>
    </form>
</div>
@endsection