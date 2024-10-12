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

    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $news->title }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ $news->description }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label for="images">Image</label>
            <input type="file" name="images" class="form-control">
            @if ($news->images)
                <img src="{{ asset('storage/' . $news->images) }}" alt="News Image" width="100" class="mt-3">
            @endif
        </div>

        <div class="form-group mt-3">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" value="{{ $news->date }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update News</button>
    </form>
</div>
@endsection
