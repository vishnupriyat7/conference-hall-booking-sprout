<!-- resources/views/book-hall-form.blade.php -->
@extends('layout.layout')

@section('space-work')
<div class="container-fluid">
    <h1>Book Hall</h1>

    <form action="{{route('hallBooking.store')}}" method="POST">
        @csrf
        <input type="hidden" name="date" value="{{ request('date') }}">

        <div class="mb-3">
            <label for="section" class="form-label">Section Name</label>
            <input type="text" class="form-control" id="section" name="section" value="{{ auth()->user()->name }}" readonly>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Selected Date</label>
            <input type="text" class="form-control" id="date" name="date" value="{{ request('date') }}" readonly>
        </div>

        <div class="mb-3">
            <label for="hall" class="form-label">Select Hall</label>
            <select class="form-select" id="hall" name="hall" required>
                <option value="" disabled selected>Select a hall</option>
                @foreach ($halls as $hall)
                    <option value="{{ $hall->id }}">{{ $hall->hall_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="time_from" class="form-label">Time From</label>
            <input type="time" class="form-control" id="time_from" name="time_from" required>
        </div>

        <div class="mb-3">
            <label for="time_to" class="form-label">Time To</label>
            <input type="time" class="form-control" id="time_to" name="time_to" required>
        </div>

        <div class="mb-3">
            <label for="remarks" class="form-label">Meeting Details</label>
            <textarea class="form-control" id="remarks" name="remarks" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Book Hall</button>
    </form>
</div>
@endsection
