<?php

namespace App\Http\Controllers;

use App\Models\SchoolYear;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SchoolYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $school_years = SchoolYear::all();
        return view('school_years.index', compact('school_years'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('school_years.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:school_years,name'
        ]);

        if ($request->activation) {
            SchoolYear::where('activation', true)->update(['activation' => false]);
        }
        SchoolYear::create([
            'name' => $request->name,
            'activation' => $request->activation
        ]);

        Alert::success('Success', 'Created Successfully');
        return redirect()->route('school_years.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolYear $schoolYear)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolYear $schoolYear)
    {
        return view('shool_years.edit', compact('schoolYear'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SchoolYear $schoolYear)
    {
        $school_year_id = $schoolYear->id;
        $request->validate([
            'name' => "required|unique:school_years,name,$school_year_id"
        ]);

        if ($request->activation) {
            SchoolYear::where('activation', true)->update(['activation' => false]);
        }
        $schoolYear->update([
            'name' => $request->name,
            'activation' => $request->activation
        ]);

        Alert::success('Success', 'Updated Successfully');
        return redirect()->route('school_years.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolYear $schoolYear)
    {
        $schoolYear->delete();
        Alert::success('Success', 'Deleted Successfully');
        return redirect()->route('school_years.index');
    }
}
