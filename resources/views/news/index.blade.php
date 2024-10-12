@extends('layouts.app-admin')

@section('content')
<div class="container m-4">
    <a href="{{ route('news.create') }}" class="btn btn-primary mb-3">Add New News</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-responsive table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Date</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $newsItem)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $newsItem->title }}</td>
                <td>{{ $newsItem->date }}</td>
                <td><img src="{{ asset('storage/' . $newsItem->images) }}" alt="News Image" width="100"></td>
                <td>
                    <a href="{{ route('news.edit', $newsItem->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('news.destroy', $newsItem->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
