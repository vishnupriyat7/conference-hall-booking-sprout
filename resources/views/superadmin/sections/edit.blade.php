@extends('layout.layout')

@section('space-work')
<h2 class="mb-4">Create New Section</h2>

<form action="{{ route('sections.update', $section->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Spoofing the PUT method for updating -->


    <div class="form-group mb-3">
        <label for="name" class="form-label">Section Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{$section->name}}">
    </div>

    <div class="form-group mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{$section->email}}">
    </div>

    <div class="form-group mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" id="phone" class="form-control" value="{{$section->phone}}">
    </div>

    <button type="submit" class="btn btn-success">Update Section</button>
</form>
@endsection
