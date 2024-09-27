<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hall;

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
}
