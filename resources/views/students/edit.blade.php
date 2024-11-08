@extends('layouts.master')

<x-navbar></x-navbar>

@section('page_title')
    Student
@endsection

<x-sidebar></x-sidebar>

@section('main')

    <form action="{{route('students.update', [$student])}}" method="POST">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Update Student
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <x-label>Student Number</x-label>
                                        <x-input-number name="student_number" value="{{$student->student_number}}"></x-input-number>
                                        <x-validation name="student_number"></x-validation>
                                    </div>
                                    <div class="col-4">
                                        <x-label>Name</x-label>
                                        <x-input-text name="name" value="{{$student->user->name}}"></x-input-text>
                                        <x-validation name="name"></x-validation>
                                    </div>

                                    <div class="col-4">
                                        <x-label>Email</x-label>
                                        <x-input-text name="email" value="{{$student->user->email}}"></x-input-text>
                                        <x-validation name="email"></x-validation>
                                    </div>

                                    <div class="col-4">
                                        <x-label>Course</x-label>
                                        <select class="form-select form-select-sm" name="course_id" id="">
                                            @foreach($courses as $course)
                                                <option @if($student->course_id == $course->id) selected @endif value="{{$course->id}}">{{$course->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-validation name="course_id"></x-validation>
                                    </div>

                                    <div class="col-4">
                                        <x-label>Year Level</x-label>
                                        <select class="form-select form-select-sm" name="year_level_id" id="">
                                            @foreach($year_levels as $year_level)
                                                <option @if($student->year_level_id == $year_level->id) selected @endif value="{{$year_level->id}}">{{$year_level->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-validation name="year_level_id"></x-validation>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-4">
                                <a class="btn btn-sm btn-danger" href="{{route('students.index')}}">Cancel</a>
                            </div>
                            <div class="col-4">
                                <x-btn type="submit">Save</x-btn>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @section('script')

    @endsection



@endsection
