@extends('layouts.master')

<x-navbar></x-navbar>

@section('page_title')
    Update Password
@endsection

<x-sidebar></x-sidebar>

@section('main')

    <form action="{{route('users.update-password', [$user])}}" method="POST">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        New Password
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">

                                    <div class="col-4">
                                        <x-label>Password</x-label>
                                        <input type="text" hidden name="password_reset" value="0">
                                        <x-input-text name="password"></x-input-text>
                                        <x-validation name="password"></x-validation>
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
