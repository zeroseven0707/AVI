@extends('layouts.app-admin')
@section('content')
<div class="container m-4">
    <div class="card mb-3">
        <div class="card-body">
            <h3>{{ $campaign->title }}</h3>
            <p>{{ $campaign->description }}</p>
            <p><strong>Goal Amount:</strong> {{ $campaign->goal_amount }}</p>
            <p><strong>Raised Amount:</strong> {{ $campaign->raised_amount }}</p>
            <p><strong>Start Date:</strong> {{ $campaign->start_date }}</p>
            <p><strong>End Date:</strong> {{ $campaign->end_date }}</p>
            <p><strong>Status:</strong> {{ $campaign->status }}</p>
        </div>
    </div>
    
    <a href="{{ route('campaigns.index') }}" class="btn btn-secondary">Back to Campaign List</a>
    <a href="{{ route('campaigns.edit', $campaign->id) }}" class="btn btn-primary">Edit Campaign</a>
</div>
@endsection
