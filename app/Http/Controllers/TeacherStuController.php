<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Student;

class TeacherStuController extends Controller
{

    public function showSections()
    {
        $sections = Section::withCount('students')->get();
        return view('admin.sections.show', compact('sections'));
    }

    // Handle section creation
    public function createSection(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'student_limit' => 'required|integer|min:1',
        ]);

        Section::create([
            'name' => $request->name,
            'student_limit' => $request->student_limit,
            'is_active' => true
        ]);

        return redirect()->back()->with('success', 'Section created successfully!');
    }
    public function indexStudent($sectionId)
    {
        // Retrieve the section with the count of students
        $section = Section::withCount('students')->findOrFail($sectionId);

        return view('admin.sections.createStudent', compact('section'));
    }
    public function addStudent(Request $request, $sectionId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $section = Section::findOrFail($sectionId);

        // Check if the section has reached its student limit
        if ($section->students()->count() >= $section->student_limit) {
            return redirect()->back()->with('error', 'This section is full. Cannot add more students.');
        }

        // Create the new student
        $section->students()->create([
            'name' => $request->name,
        ]);

        return redirect()->route('sections.show')->with('success', 'Student added successfully!');
    }
    public function showAllStudent(){
        $students = Student::with('section')->get();

        // Return the view with the students
        return view('admin.sections.index', compact('students'));
    }
}
