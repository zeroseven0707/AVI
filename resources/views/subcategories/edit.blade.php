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

    <form action="{{ route('subcategories.update', $subcategories->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="category_id">Category</label>
            <select id="category_id" class="form-control" name="category_id">
                @foreach ($category as $item)
                <option value="{{ $item['id'] }}" {{ ($item['id'] == $subcategories->category_id)?'selected':'' }}>{{ $item['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $subcategories->name }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ $subcategories->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Sub Categories</button>
    </form>
</div>
@endsection
