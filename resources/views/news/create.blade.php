@extends('layouts.app-admin')
@section('content')
<div class="container m-4">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label for="images">Image</label>
            <input type="file" name="images" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Add News</button>
    </form>
</div>
@endsection
