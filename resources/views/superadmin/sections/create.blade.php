@extends('layout.layout')

@section('space-work')
<h2 class="mb-4">Create New Section</h2>

<form action="{{ route('sections.store') }}" method="POST">
    @csrf


    <div class="form-group mb-3">
        <label for="name" class="form-label">Section Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" id="phone" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Create Section</button>
</form>
@endsection

