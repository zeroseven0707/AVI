@extends('layouts.app-admin')
@section('content')
<div class="container m-4">
    <a href="{{ route('campaigns.create') }}" class="btn btn-primary">Create New Campaign</a>
    <table class="table table-responsive table-striped mt-3">
        <thead>
            <tr>
                <th>Images</th>
                <th>Title</th>
                <th>Goal Amount</th>
                <th>Raised Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($campaigns as $campaign)
            <tr>
                <td>
                    @foreach (json_decode($campaign->images) as $image)
                        <img src="{{ asset('storage/' . $image) }}" alt="Campaign Image" style="width: 50px; height: 50px;">
                    @endforeach
                </td>
                <td>{{ $campaign->title }}</td>
                <td>{{ $campaign->goal_amount }}</td>
                <td>{{ $campaign->raised_amount }}</td>
                <td>{{ $campaign->status }}</td>
                <td>
                    <a href="{{ route('campaigns.show', $campaign->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('campaigns.edit', $campaign->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('campaigns.destroy', $campaign->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
