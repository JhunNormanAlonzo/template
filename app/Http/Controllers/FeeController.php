<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Fee;
use App\Models\SchoolYear;
use App\Models\YearLevel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use function App\Providers\warningDelete;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fees = Fee::all();
        warningDelete();
        return view('fees.index', compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        $year_levels = YearLevel::all();
        $school_years = SchoolYear::all();
        $activated_school_year = SchoolYear::activated();
        return view('fees.create', compact('courses', 'year_levels','school_years', 'activated_school_year'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            "course_id" => "required",
            "year_level_id" => "required",
            "school_year_id" => "required",
            "name" => "required",
            "amount" => "required",
            "activation" => "required"
        ]);


        $course_id = $request->course_id;
        $year_level_id = $request->year_level_id;
        $school_year_id = $request->school_year_id;
        $name = $request->name;
        $amount = $request->amount;
        $activation = $request->activation;
        Fee::create([
            "course_id" => $course_id,
            "year_level_id" => $year_level_id,
            "school_year_id" => $school_year_id,
            "name" => $name,
            "amount" => $amount,
            "activation" => $activation
        ]);


        Alert::success('Success', 'Created Successfully');
        return redirect()->route('fees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fee $fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fee $fee)
    {
        $courses = Course::all();
        $year_levels = YearLevel::all();
        $school_years = SchoolYear::all();
        $activated_school_year = SchoolYear::activated();
        return view('fees.edit', compact('fee', 'courses', 'year_levels', 'school_years', 'activated_school_year'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fee $fee)
    {
        $request->validate([
            "course_id" => "required",
            "year_level_id" => "required",
            "name" => "required",
            "amount" => "required",
            "activation" => "required"
        ]);

        $course_id = $request->course_id;
        $year_level_id = $request->year_level_id;
        $name = $request->name;
        $amount = $request->amount;
        $activation = $request->activation;
        $fee->update([
            "course_id" => $course_id,
            "year_level_id" => $year_level_id,
            "name" => $name,
            "amount" => $amount,
            "activation" => $activation
        ]);


        Alert::success('Success', 'Updated Successfully');
        return redirect()->route('fees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fee $fee)
    {
        $fee->delete();
        Alert::success('Success', 'Deleted Successfully');
        return redirect()->route('fees.index');
    }
}
