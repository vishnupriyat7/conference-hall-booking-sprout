<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Section;

class SectionController extends Controller
{
    public function sections()
    {
        $sections = Section::get();
        return view('superadmin.sections.sections', compact('sections'));
    }
    public function create()
    {
        return view('superadmin.sections.create'); // Load the form for creating a new section
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        Section::create($request->all()); // Assuming you have a Section model

        return redirect()->route('AdminSections')->with('success', 'Section created successfully!');
    }

    // Edit method (show the edit form)
    public function edit($id)
    {
        $section = Section::findOrFail($id);
        return view('superadmin.sections.edit', compact('section'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        // Find the section by ID
        $section = Section::findOrFail($id);

        // Update the section with new data
        $section->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        // Redirect back to the section list with a success message
        return redirect()->route('AdminSections')->with('success', 'Section updated successfully!');
    }

    // Destroy method (delete the section)
    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        $section->delete();

        return redirect()->route('AdminSections')->with('success', 'Section deleted successfully!');
    }
}
