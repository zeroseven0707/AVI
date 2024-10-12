@extends('layouts.app-admin')
@section('content')
<div class="container m-4">
    <div class="card mb-3">
        <div class="card-body">
            <h3>{{ $categories->title }}</h3>
            <p>{{ $categories->description }}</p>
            <p><strong>Goal Amount:</strong> {{ $categories->goal_amount }}</p>
            <p><strong>Raised Amount:</strong> {{ $categories->raised_amount }}</p>
            <p><strong>Start Date:</strong> {{ $categories->start_date }}</p>
            <p><strong>End Date:</strong> {{ $categories->end_date }}</p>
            <p><strong>Status:</strong> {{ $categories->status }}</p>
        </div>
    </div>
    
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to categories List</a>
    <a href="{{ route('categories.edit', $categories->id) }}" class="btn btn-primary">Edit categories</a>
</div>
@endsection
