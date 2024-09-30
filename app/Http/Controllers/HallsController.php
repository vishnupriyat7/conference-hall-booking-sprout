<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hall;
use App\Models\HallBooking;

class HallsController extends Controller
{
    public function halls()
    {
        $halls = Hall::get();
        return view('superadmin.halls.halls', compact('halls'));
    }
    public function create()
    {
        return view('superadmin.halls.create'); // Load the form for creating a new section
    }
    public function store(Request $request)
    {
        $request->validate([
            'hall_name' => 'required',
            'hall_code' => 'required',
            'hall_location' => 'required',
        ]);

        Hall::create($request->all()); // Assuming you have a Section model

        return redirect()->route('AdminHalls')->with('success', 'Hall created successfully!');
    }

    // Edit method (show the edit form)
    public function edit($id)
    {
        $hall = Hall::findOrFail($id);
        return view('superadmin.halls.edit', compact('hall'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form input
        $request->validate([
            'hall_name' => 'required',
            'hall_code' => 'required',
            'hall_location' => 'required',
        ]);

        // Find the section by ID
        $hall = Hall::findOrFail($id);

        // Update the section with new data
        $hall->update([
            'hall_name' => $request->input('hall_name'),
            'hall_code' => $request->input('hall_code'),
            'hall_location' => $request->input('hall_location'),
        ]);

        // Redirect back to the section list with a success message
        return redirect()->route('AdminHalls')->with('success', 'Hall updated successfully!');
    }

    // Destroy method (delete the section)
    public function destroy($id)
    {
        $hall = Hall::findOrFail($id);
        $hall->delete();

        return redirect()->route('AdminHalls')->with('success', 'Hall deleted successfully!');
    }
    public function bookHall()
    {
        return view('superadmin.halls.bookhall.bookhall-calendar'); // This will render the 'book-hall' view
    }

    public function showBookingForm(Request $request)
    {
        // Fetch halls from the database
        $halls = Hall::all(); // Assuming you have a Hall model

        return view('superadmin.halls.bookhall.hallbook', compact('halls'));
    }

    public function storeBooking(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'section' => 'required|string',
            'hall' => 'required|exists:halls,id',
            'time_from' => 'required|date_format:H:i',
            'time_to' => 'required|date_format:H:i|after:time_from',
            'remarks' => 'nullable|string',
        ]);

        // Create a new booking record
        HallBooking::create([
            'date' => $request->date,
            'section' => $request->section,
            'hall_id' => $request->hall, // Corrected to 'hall_id'
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,
            'remarks' => $request->remarks,
        ]);

        return redirect()->route('bookHall')->with('success', 'Hall booked successfully!');
    }
    public function getBookings()
    {
        // Fetch all hall bookings
        $bookings = HallBooking::with('hall')->get();

        // Transform bookings to FullCalendar format
        $events = $bookings->map(function ($booking) {
            return [
                'title' => $booking->hall->hall_name, // Display the actual hall name
                'start' => $booking->date . 'T' . $booking->time_from, // Start time
                'end' => $booking->date . 'T' . $booking->time_to, // End time
                'description' => $booking->section . ' booked from ' . $booking->time_from . ' to ' . $booking->time_to, // Section and time range
            ];
        });

        return response()->json($events);
    }
}
