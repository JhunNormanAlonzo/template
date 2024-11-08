@extends('layouts.master')

<x-navbar></x-navbar>

@section('page_title')
    Student
@endsection

<x-sidebar></x-sidebar>

@section('main')

    <form action="{{route('students.store')}}" method="POST">
        @csrf
        @method("POST")
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Create Student
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <x-label>Student Number</x-label>
                                        <x-input-number name="student_number" ></x-input-number>
                                        <x-validation name="student_number"></x-validation>
                                    </div>
                                    <div class="col-4">
                                        <x-label>Name</x-label>
                                        <x-input-text name="name" ></x-input-text>
                                        <x-validation name="name"></x-validation>
                                    </div>

                                    <div class="col-4">
                                        <x-label>Email</x-label>
                                        <x-input-text name="email" ></x-input-text>
                                        <x-validation name="email"></x-validation>
                                    </div>

                                    <div class="col-4">
                                        <x-label>Course</x-label>
                                        <select class="form-select form-select-sm" name="course_id" id="">
                                            @foreach($courses as $course)
                                                <option value="{{$course->id}}">{{$course->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-validation name="course_id"></x-validation>
                                    </div>

                                    <div class="col-4">
                                        <x-label>Year Level</x-label>
                                        <select class="form-select form-select-sm" name="year_level_id" id="">
                                            @foreach($year_levels as $year_level)
                                                <option value="{{$year_level->id}}">{{$year_level->name}}</option>
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
