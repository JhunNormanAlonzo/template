@extends('layouts.master')

<x-navbar></x-navbar>

@section('page_title')
    Course
@endsection

<x-sidebar></x-sidebar>

@section('main')

    <form action="{{route('courses.update', [$course])}}" method="POST">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Update Course
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <x-label>Name</x-label>
                                        <x-input-text value="{{$course->name}}" name="name" placeholder="(ex) 1990-1991"></x-input-text>
                                        <x-validation name="name"></x-validation>
                                    </div>
                                    <div class="col-12">
                                        <x-label>Description</x-label>
                                        <x-textarea name="description">{{$course->description}}</x-textarea>
                                        <x-validation name="description"></x-validation>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-4">
                                <a class="btn btn-sm btn-danger" href="{{route('courses.index')}}">Cancel</a>
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
