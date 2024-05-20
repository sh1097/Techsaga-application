<!-- resources/views/applications/edit.blade.php -->

@extends('layouts.master')

@section('main-content')
    <h1>Edit Customer</h1>

    <form method="POST" action="{{ route('application.update', $application->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $application->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $application->email }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Password</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $application->address }}" required>
        </div>

        <!-- Add more fields as needed -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
