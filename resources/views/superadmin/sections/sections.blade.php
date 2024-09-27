@extends('layout.layout')
@section('space-work')
<h2 class="mb-4">Sections</h2>

<!-- Success Message -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Button to add a new section -->
<a href="{{ route('sections.create') }}" class="btn btn-primary mb-3">Add New Section</a>

@if($sections->isEmpty())
    <!-- Message when there are no sections -->
    <div class="alert alert-info">
        No section details available. Please click the "Add New Section" button to create one.
    </div>
@else
    <!-- Table displaying section details -->
    <table class="table">
        <tr>
            <th>/</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
        @foreach($sections as $section)
        <tr>
            <td>{{$section->id}}</td>
            <td>{{$section->name}}</td>
            <td>{{$section->email}}</td>
            <td>{{$section->phone}}</td>
            <td>
                <!-- Edit Button -->
                <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <!-- Delete Button (with form) -->
                <form action="{{ route('sections.destroy', $section->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this section?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endif
@endsection
