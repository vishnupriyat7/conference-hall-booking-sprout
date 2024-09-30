<!-- resources/views/book-hall.blade.php -->
@extends('layout.layout') <!-- Assuming you're using a base layout -->

@section('space-work')
<div class="container-fluid">
    <h1>Book Hall</h1>
     @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div id="calendar"></div>
</div>

<!-- Include FullCalendar -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth', // Shows the current month
            selectable: true, // Allows you to select dates for booking
            // Fetch events from server dynamically
            events: "{{ route('hallBookings.fetch') }}", // This route returns booking data as JSON
            dateClick: function(info) {
                // alert('Date: ' + info.dateStr);
                window.location.href = "{{ route('hallBooking.form') }}?date=" + info.dateStr;
            },
            eventClick: function(info) {
                alert(
                    'Hall: ' + info.event.title + '\n' + // Hall name
                    info.event.extendedProps.description // Section and time range
                );
            }
        });

        calendar.render();
    });
</script>
@endsection
