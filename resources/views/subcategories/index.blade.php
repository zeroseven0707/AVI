@extends('layouts.app-admin')
@section('content')
<div class="container m-4">
    <a href="{{ route('subcategories.create') }}" class="btn btn-primary mb-3">Add New Sub Category</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Category</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subcategories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->category->name }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description ?? 'No Description' }}</td>
                <td>
                    <a href="{{ route('subcategories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('subcategories.destroy', $category->id) }}" method="POST" style="display:inline;">
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
