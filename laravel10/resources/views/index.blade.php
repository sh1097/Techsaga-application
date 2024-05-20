@extends('layouts.master')
@section('main-content')
<h1>List of Customer</h1>
<div class="container">
    <div class="text-end mb-5"><a class="btn btn-info" href="{{route('application.store')}}">New Applicants</a>
    </div>
 <table class="table table-bordered table-striped">
    <thead style="">
        <th>Name</th><th>Email</th></th><th>Actions</th><th>Status</th>
    </thead>
    <tbody>
        @forelse($applicants as $appl)
        <tr>
            <td>{{$appl->name}}</td><td>{{$appl->email}}</td>
            <td>
    <a href="{{ route('application.edit', $appl->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('application.destroy', $appl->id) }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</td>
<td>
    @if($appl->status == 'pending')
        <form action="{{ route('application.approve', $appl->id) }}" method="POST" style="display:inline">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-success">Approve</button>
        </form>
        <form action="{{ route('application.reject', $appl->id) }}" method="POST" style="display:inline">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-danger">Reject</button>
        </form>
    @else
        <span class="badge badge-{{ $appl->status == 'approved' ? 'success' : 'danger' }}">{{ ucfirst($appl->status) }}</span>
    @endif
</td>


        </tr>
        @empty
        <tr>
            <td colspan="3">No data Found</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection