@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow p-4">
            <h2 class="mb-4 text-center">Login</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>
                <p class="mt-3 text-center">No account yet? <a href="{{ route('register.form') }}">Register</a></p>
            </form>
        </div>
    </div>
</div>
@endsection