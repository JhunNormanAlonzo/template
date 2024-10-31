<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use App\Models\YearLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use function App\Providers\warningDelete;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        warningDelete();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        $year_levels = YearLevel::all();
        return view('students.create', compact('courses', 'year_levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required",
            "email" => "required|email|unique:users,email",
            "course_id" => "required",
            "year_level_id" => "required",
            "student_number" => "required|unique:students,student_number"
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make("admin123"),
        ]);

        Student::create([
            "user_id" => $user->id,
            "course_id" => $request->course_id,
            "year_level_id" => $request->year_level_id,
            "student_number" => $request->student_number
        ]);

        Alert::success('Success', 'Created Successfully');
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $courses = Course::all();
        $year_levels = YearLevel::all();
        return redirect()->route('students.index', compact('student', 'year_levels', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //

        Alert::success('Success', 'Updated Successfully');
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        Alert::success('Success', 'Deleted Successfully');
        return redirect()->route('students.index');
    }
}
