<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fees = Fee::where('activation', true)->count();
        $students = Student::all();
        $student_counts = Student::count();
        $sales = Payment::sum('amount');

        return view('home', compact('fees', 'students', 'student_counts', 'sales'));
    }
}
