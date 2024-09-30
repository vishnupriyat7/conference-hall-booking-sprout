<!-- resources/views/book-hall.blade.php -->
@extends('layout.layout') <!-- Assuming you're using a base layout -->

@section('space-work')
<div class="container-fluid">
    <h1>Book Hall</h1>
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
            events: [
                // You can load booked events here from the server if needed
            ],
            dateClick: function(info) {
                alert('Date: ' + info.dateStr);
                // Handle booking logic here
            }
        });

        calendar.render();
    });
</script>
@endsection
