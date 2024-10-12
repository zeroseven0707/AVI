@extends('layouts.app-admin')
@section('content')
<div class="container m-4">
    <form action="{{ route('campaigns.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="category">Category</label>
            <select id="category" class="form-control" name="category_id">
                <option value="">Select Category</option>
                @foreach ($categories as $item)
                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="subcategories_id">Subcategory</label>
            <select id="subcategories_id" class="form-control" name="subcategories_id" disabled>
                <option value="">Select Subcategory</option>
            </select>
        </div>
        <div class="form-group">
            <label for="images">Images:</label>
            <input type="file" name="images[]" id="images" class="form-control" multiple>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="goal_amount">Goal Amount:</label>
            <input type="number" name="goal_amount" id="goal_amount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Create Campaign</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#category').on('change', function() {
            var categoryId = $(this).val();
            var subcategorySelect = $('#subcategories_id');
            
            if (categoryId) {
                $.ajax({
                    url: '/show-subcategory/' + categoryId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        subcategorySelect.empty(); // Clear previous options
                        subcategorySelect.append('<option value="">Select Subcategory</option>');
                        $.each(data, function(key, value) {
                            subcategorySelect.append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                        subcategorySelect.prop('disabled', false); // Enable subcategory select
                    },
                    error: function() {
                        alert('Failed to fetch subcategories. Please try again.');
                    }
                });
            } else {
                subcategorySelect.empty();
                subcategorySelect.append('<option value="">Select Subcategory</option>');
                subcategorySelect.prop('disabled', true); // Disable subcategory select
            }
        });
    });
</script>
@endsection
