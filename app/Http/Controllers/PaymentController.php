<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Fee;
use App\Models\Payment;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student_number = $request->student_number;
        $student = Student::where("student_number", $student_number)->first();
        $user = $student->user;
        $fee_id = $request->fee_id;
        $user_id = $user->id;
        $student_id = $student->id;
        $name = $user->name;
        $email = $user->email;
        $course = $student->course->name;
        $year_level = $student->yearLevel->name;
        $amount = $request->amount;

        Payment::create([
            'user_id' => $user_id,
            'student_id' => $student_id,
            'fee_id' => $fee_id,
            'student_number' => $student_number,
            'name' => $name,
            'email' => $email,
            'course' => $course,
            'year_level' => $year_level,
            'amount' => $amount,
        ]);

        Alert::success('Success', 'Payment Recorded');
        return redirect()->back();g
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }

    public function feeLists(Request $request)
    {
        $student_number = $request->student_number;

        $student = Student::where("student_number", $student_number)->first();

        $course_id = $student->course_id;
        $year_level_id = $student->year_level_id;
        $fees = Fee::with('schoolYear')->where("course_id", $course_id)
            ->where("year_level_id", $year_level_id)
            ->where("activation", true)
            ->get();
        return response()->json($fees);
    }
}