@extends('layout.layout')

@section('space-work')
<h2 class="mb-4">Edit Hall</h2>

<form action="{{ route('halls.update', $hall->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Spoofing the PUT method for updating -->


    <div class="form-group mb-3">
        <label for="hall_name" class="form-label">Hall Name</label>
        <input type="text" name="hall_name" id="hall_name" class="form-control" value="{{$hall->hall_name}}">
    </div>

    <div class="form-group mb-3">
        <label for="hall_code" class="form-label">Hall Code</label>
        <input type="text" name="hall_code" id="hall_code" class="form-control" value="{{$hall->hall_code}}">
    </div>

    <div class="form-group mb-3">
        <label for="hall_location" class="form-label">Hall Location</label>
        <input type="text" name="hall_location" id="hall_location" class="form-control" value="{{$hall->hall_location}}">
    </div>

    <button type="submit" class="btn btn-success">Update Hall</button>
</form>
@endsection
