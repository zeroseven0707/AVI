@extends('layouts.app-admin')
@section('content')
<div class="container m-4">
    <form action="{{ route('campaigns.update', $campaign->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $campaign->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" required>{{ $campaign->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="goal_amount">Goal Amount:</label>
            <input type="number" name="goal_amount" id="goal_amount" class="form-control" value="{{ $campaign->goal_amount }}" required>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $campaign->start_date }}" required>
        </div>

        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $campaign->end_date }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="active" {{ $campaign->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="completed" {{ $campaign->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ $campaign->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Campaign</button>
        <a href="{{ route('campaigns.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
