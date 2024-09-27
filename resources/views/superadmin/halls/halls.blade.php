@extends('layout.layout')
@section('space-work')
    <h2 class="mb-4">Halls</h2>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Button to add a new section -->
    <a href="{{ route('halls.create') }}" class="btn btn-primary mb-3">Add New Hall</a>

    @if ($halls->isEmpty())
        <!-- Message when there are no halls -->
        <div class="alert alert-info">
            No Hall details available. Please click the "Add New Hall" button to create one.
        </div>
    @else
        <!-- Table displaying section details -->
        <table class="table">
            <tr>
                <th>/</th>
                <th>Name</th>
                <th>Code</th>
                <th>Location</th>
                <th>Action</th>
            </tr>
            @foreach ($halls as $hall)
                <tr>
                    <td>{{ $hall->id }}</td>
                    <td>{{ $hall->hall_name }}</td>
                    <td>{{ $hall->hall_code }}</td>
                    <td>{{ $hall->hall_location }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('halls.edit', $hall->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Delete Button (with form) -->
                        <form action="{{ route('halls.destroy', $hall->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this section?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection
