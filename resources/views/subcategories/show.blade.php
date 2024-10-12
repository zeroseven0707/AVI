@extends('layouts.app-admin')
@section('content')
<div class="container m-4">
    <div class="card mb-3">
        <div class="card-body">
            <h3>{{ $subcategories->title }}</h3>
            <p>{{ $subcategories->description }}</p>
            <p><strong>Goal Amount:</strong> {{ $subcategories->goal_amount }}</p>
            <p><strong>Raised Amount:</strong> {{ $subcategories->raised_amount }}</p>
            <p><strong>Start Date:</strong> {{ $subcategories->start_date }}</p>
            <p><strong>End Date:</strong> {{ $subcategories->end_date }}</p>
            <p><strong>Status:</strong> {{ $subcategories->status }}</p>
        </div>
    </div>
    
    <a href="{{ route('subcategories.index') }}" class="btn btn-secondary">Back to subcategories List</a>
    <a href="{{ route('subcategories.edit', $subcategories->id) }}" class="btn btn-primary">Edit subcategories</a>
</div>
@endsection
