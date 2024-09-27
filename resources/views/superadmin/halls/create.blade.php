@extends('layout.layout')

@section('space-work')
<h2 class="mb-4">Create New Hall</h2>

<form action="{{ route('halls.store') }}" method="POST">
    @csrf


    <div class="form-group mb-3">
        <label for="hall_name" class="form-label">Hall Name</label>
        <input type="text" name="hall_name" id="hall_name" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label for="hall_code" class="form-label">Hall Code</label>
        <input type="text" name="hall_code" id="hall_code" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label for="hall_location" class="form-label">Location</label>
        <input type="text" name="hall_location" id="hall_location" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Create Hall</button>
</form>
@endsection

