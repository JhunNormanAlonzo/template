@extends('layouts.master')

<x-navbar></x-navbar>

@section('page_title')
    Fee
@endsection

<x-sidebar></x-sidebar>

@section('main')

    <form action="{{route('fees.update', [$fee])}}" method="POST">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Update Fee
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <x-label>Course</x-label>
                                <select class="form-select form-select-sm" name="course_id" id="">
                                    @foreach($courses as $course)
                                        <option @if($fee->course_id == $course->id) selected @endif value="{{$course->id}}">{{$course->name}}</option>
                                    @endforeach
                                </select>
                                <x-validation name="course_id"></x-validation>
                            </div>

                            <div class="col-4">
                                <x-label>Year Level</x-label>
                                <select class="form-select form-select-sm" name="year_level_id" id="">
                                    @foreach($year_levels as $year_level)
                                        <option @if($fee->year_level_id == $year_level->id) selected @endif value="{{$year_level->id}}">{{$year_level->name}}</option>
                                    @endforeach
                                </select>
                                <x-validation name="year_level_id"></x-validation>
                            </div>

                            <div class="col-4">
                                <x-label>School Year</x-label>
                                <select class="form-select form-select-sm" name="school_year_id" id="">
                                    @foreach($school_years as $school_year)
                                        <option @if($fee->school_year_id == $school_year->id) selected @endif value="{{$school_year->id}}">{{$school_year->name}}</option>
                                    @endforeach
                                </select>
                                <x-validation name="school_year_id"></x-validation>
                            </div>

                            <div class="col-4">
                                <x-label>Name</x-label>
                                <x-input-text name="name" value="{{$fee->name}}"></x-input-text>
                                <x-validation name="name"></x-validation>
                            </div>

                            <div class="col-4">
                                <x-label>Amount</x-label>
                                <x-input-number value="{{$fee->amount}}" name="amount" step="0.01" ></x-input-number>
                                <x-validation name="amount"></x-validation>
                            </div>

                            <div class="col-4">
                                <x-label>Activation</x-label>
                                <select class="form-select form-select-sm" name="activation" id="">
                                    <option @if($fee->activation == false) selected @endif value="0">Inactivate</option>
                                    <option @if($fee->activation == true) selected @endif value="1">Activate</option>
                                </select>
                                <x-validation name="activation"></x-validation>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-4">
                                <a class="btn btn-sm btn-danger" href="{{route('fees.index')}}">Cancel</a>
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
        <script>
            $("#table").DataTable();
        </script>
    @endsection



@endsection
